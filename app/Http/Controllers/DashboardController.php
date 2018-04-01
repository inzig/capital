<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Admin\WalletRepository;
use App\Repositories\Admin\PaymentRepository;
use App\Repositories\Admin\UserRepository;
use App\Repositories\Admin\SettingRepository;
use App\Repositories\Admin\SortableContentRepository;
use App\Repositories\Admin\DiscountRepository;
use Flash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Stripe;

class DashboardController extends Controller
{
    /** @var  SortableContentRepository */
    private $sortableContentRepository;

    /** @var  WalletRepository */
    private $walletRepository;

    /** @var  PaymentRepository */
    private $paymentRepository;

    /** @var  UserRepository */
    private $userRepository;

    /** @var  SettingRepository */
    private $settingRepository;

    /** @var  DiscountRepository */
    private $discountRepository;

    public function __construct(WalletRepository $walletRepo, PaymentRepository $paymentRepo, UserRepository $userRepo, SettingRepository $settingRepo, SortableContentRepository $sortableContentRepository, DiscountRepository $discountRepository)
    {
        $this->walletRepository = $walletRepo;
        $this->paymentRepository = $paymentRepo;
        $this->userRepository = $userRepo;
        $this->settingRepository = $settingRepo;
        $this->sortableContentRepository = $sortableContentRepository;
        $this->discountRepository = $discountRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wallets = $this->walletRepository->findByField('user_id', Auth::id())->keyBy('type')->all();
        $usersCount = $this->userRepository->all()->count();
        $settingsWallets = $this->settingRepository->findWhereIn('field', ['ethereum', 'bitcoin', 'litecoin', 'dashcoin'])->all();
        $tokenBaseRate = $this->settingRepository->findWhereIn('field', ['base_rate'])->first();
        $discounts = $this->discountRepository->all();

        $items = [];

        foreach ($settingsWallets as $wallet) {
            $item = new \stdClass();

            $item->type = $wallet->field;
            $item->address = $wallet->value;

            $items[] = $item;
        }

        $adminWallets = collect($items)->keyBy('type');

        return view('dashboard.index', compact('wallets', 'usersCount', 'adminWallets', 'discounts', 'tokenBaseRate'));
    }

    public function update(Request $request)
    {
        $wallet = $this->walletRepository->firstOrNew(['user_id' => Auth::id(), 'type' => $request->input('type')]);
        $wallet->fill($request->input());
        $wallet->save();

        Flash::success('Wallet saved successfully.');

        return redirect(route('dashboard'));
    }

    public function contribute()
    {
        $settings = $this->settingRepository->findWhereIn('field', ['ethereum', 'bitcoin', 'litecoin'])->all();
        $tokenBaseRate = $this->settingRepository->findWhereIn('field', ['base_rate'])->first();
        $userEthereumWallet = $this->walletRepository->findWhere(['user_id' => ['user_id', '=', Auth::id()], 'type' => ['type', '=', 'ethereum']])->first();
        $currentDiscount = $this->discountRepository->findWhere(['start_date' => ['start_date', '<=', Carbon::now()], 'end_date' => ['end_date', '>=', Carbon::now()]])->first();
        $currentDiscountRates = [];
        if(!is_null($currentDiscount)) {
            $currentDiscountRates = $currentDiscount->discount_rates->groupBy('currency')->all();
        }

        $discountRates = [];
        $discountRates['all'] = isset($currentDiscountRates['']) ? $currentDiscountRates[''] : 0;
        $discountRates['bitcoin'] = isset($currentDiscountRates['bitcoin']) ? $currentDiscountRates['bitcoin'] : $discountRates['all'];
        $discountRates['usd'] = isset($currentDiscountRates['card']) ? $currentDiscountRates['card'] : $discountRates['all'];
        $discountRates['ethereum'] = isset($currentDiscountRates['ethereum']) ? $currentDiscountRates['ethereum'] : $discountRates['all'];
        $discountRates['litecoin'] = isset($currentDiscountRates['litecoin']) ? $currentDiscountRates['litecoin'] : $discountRates['all'];

        $items = [];

        foreach ($settings as $wallet) {
            $item = new \stdClass();

            $item->type = $wallet->field;
            $item->address = $wallet->value;

            $items[] = $item;
        }

        $wallets = collect($items)->keyBy('type');
        $stripe_key = config('services.stripe')['key'];
        $base_rate = $this->settingRepository->findByField('field', 'base_rate')->first();
        $base_rate_value = 0;

        if ($base_rate) {
            $base_rate_value = $base_rate->value;
        }
        $base_rate  = $base_rate_value;
        return view('dashboard.contribute', compact('wallets', 'base_rate' , 'discountRates', 'tokenBaseRate', 'stripe_key', 'userEthereumWallet'));
    }

    public function recordTransaction(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required|numeric|between:0,9999999999',
            'currency' => 'required|in:ethereum,bitcoin,litecoin,usd',
            'estimated_tokens' => 'required',
            'discount' => 'required'
        ]);

        $data = $request->input();
        $data['dated'] = Carbon::now();
        $user = Auth::user();
        $transaction = $user->transactions()->create($data);
        $wallets = $this->walletRepository->findByField('user_id', Auth::id())->keyBy('type')->all();
        return response()->json([
            'status' => 'success',
            'transaction' => $transaction->id
        ])->with('wallets' , $wallets);
    }

    public function transactions()
    {
        $user = Auth::user();
        $transactions = $user->transactions;
        $wallets = $this->walletRepository->findByField('user_id', Auth::id())->keyBy('type')->all();
        return view('dashboard.transactions', compact('wallets' , 'transactions'));
    }

    public function calculator()
    {
        $base_rate = $this->settingRepository->findByField('field', 'base_rate')->first();
        $base_rate_value = 0;

        if ($base_rate) {
            $base_rate_value = $base_rate->value;
        }
        $wallets = $this->walletRepository->findByField('user_id', Auth::id())->keyBy('type')->all();
        return view('dashboard.calculator')
            ->with('base_rate', $base_rate_value)->with('wallets' , $wallets);
    }

    public function charge(Request $request)
    {
        $data = $request->all();

        try {
            $charge = Stripe::charges()->create([
                'metadata' => ['userId' => Auth::id()],
                'currency' => 'USD',
                'amount'   => $data['amount'],
                'source' => $data['stripeToken'],
            ]);

            $this->paymentRepository->create([
                'user_id' => Auth::id(),
                'transaction_id' => $charge['id'],
                'amount' => $charge['amount'],
                'meta' => $charge,
            ]);

            Flash::success('Payment made successfully.');
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()->withErrors();
        }
    }
}
