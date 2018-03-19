<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Admin\TransactionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use GuzzleHttp\Client;

class TransactionController extends AppBaseController
{
    /** @var  TransactionRepository */
    private $transactionRepository;

    public function __construct(TransactionRepository $transactionRepo)
    {
        $this->transactionRepository = $transactionRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->transactionRepository->pushCriteria(new RequestCriteria($request));
        $transactions = $this->transactionRepository->all();

        return view('admin.transactions.index')
            ->with('transactions', $transactions);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $transaction = $this->transactionRepository->findWithoutFail($id);

        if (empty($transaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }

        return view('admin.transactions.edit')->with('transaction', $transaction);
    }

    /**
     * Update the specified User in storage.
     *
     * @param  int              $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $transaction = $this->transactionRepository->findWithoutFail($id);

        if (empty($transaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }

        $transaction = $this->transactionRepository->update($request->all(), $id);
        $transaction->is_approved = $request->get('is_approved');
        $transaction->save();

        Flash::success('Transaction updated successfully.');

        return redirect(route('transactions.index'));
    }

    public function syncEthTransactions(Request $request)
    {
        $addressSetting = \App\Models\Setting::where('field', 'ethereum')->first();
        $address = !is_null($addressSetting) ? $addressSetting->value : '';

        $blockSetting = \App\Models\Setting::firstOrNew(['field' => 'ethereum_block']);
        $block = !is_null($blockSetting) ? $blockSetting->value : '0';

        $network = 'api';
        if (config('app.env', 'local') !== 'production') {
            //$network = 'ropsten';
        }

        $client = new Client();

        $processMore = true;
        $serviceUrl = 'https://'.$network.'.etherscan.io/api?module=account&action=txlist&address='.$address.'&sort=asc&apikey=free_key&startBlock=';

        $transactionsCount = 0;
        $processedTransactionsCount = 0;
        while($processMore) {
            $requestUrl = $serviceUrl.$block;
            $response = $client->get($requestUrl);

            $responseBody = json_decode($response->getBody()->getContents());

            foreach ($responseBody->result as $transaction) {
                if ($transaction->isError) continue;

                $localTransaction = $this->transactionRepository->findWhere(
                    [
                        'currency' => ['currency', '=', 'ethereum'],
                        'destination_address' => ['destination_address', '=', $address],
                        'source_address' => ['source_address', '=', $transaction->from],
                        'amount' => ['amount', '=', $transaction->value/1000000000000000000],
                        'transaction_id' => ['transaction_id', '=', null],
                    ]
                )->first();

                if (!is_null($localTransaction)) {
                    $localTransaction->update(['transaction_id' => $transaction->hash]);
                    ++$processedTransactionsCount;
                }

                $block = $transaction->blockNumber;
                ++$transactionsCount;
            }

            $block = $block + 1;

            if ($responseBody->status == 0) $processMore = false;
        }

        $blockSetting->value = $block;
        $blockSetting->save();

        Flash::success('Ethereum transactions synced successfully. '.$processedTransactionsCount.'/'.$transactionsCount.' transactions processed.');

        return redirect(route('transactions.index'));
    }
}
