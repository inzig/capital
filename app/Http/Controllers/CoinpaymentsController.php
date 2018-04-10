<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kevupton\LaravelCoinpayments\Exceptions\IpnIncompleteException;
use Kevupton\LaravelCoinpayments\Models\Ipn;
use Kevupton\LaravelCoinpayments\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class CoinpaymentsController extends Controller
{
    const ITEM_CURRENCY = 'USD';
    const ITEM_PRICE    = 1.5;

    /**
     * Purchase items using coinpayments payment processor
     *
     * @param Request $request
     * @return array
     */
    public function purchaseItems (Request $request)
    {
        
        // validate that the request has the appropriate values
        $this->validate($request, [
            'currency' => 'required|string',
            'amount'   => 'required|integer|min:1',
            'ethereum_wallet' => 'required|string',
        ]);
        

        $amount   = $request->get('amount');
        $currency = $request->get('currency');
        $ethereum_wallet = $request->get('ethereum_wallet');
        $rate = $request->get('single_rate');

        $user = Auth::user();
        
        $custom = $user->email . '|' .  $ethereum_wallet;
      
        $transaction = \Coinpayments::createTransactionSimple($amount, $currency, $currency , array("buyer_email"=> $user->email, "buyer_name"=> $user->name, "item_name"=>"private_sale", "item_number"=>"1", "custom"=> $custom, "ipn_url"=>"https://www.mycapitalco.in/api/ipn"));
        $transaction = json_encode($transaction, true);

        return view('dashboard.confirmation')->with('transaction', json_decode($transaction, true));;
    }

    /**
     * Creates a donation transaction
     *
     * @param Request $request
     * @return array
     */
    public function donation (Request $request)
    {
        // validate that the request has the appropriate values
        $this->validate($request, [
            'currency' => 'required|string',
            'amount'   => 'required|integer|min:0.01',
        ]);

        $amount   = $request->get('amount');
        $currency = $request->get('currency');

        /*
         * Here we are donating the exact amount that they specify.
         * So we use the same currency in and out, with the same amount value.
         */
        $transaction = \Coinpayments::createTransactionSimple($amount, $currency, $currency);

        return ['transaction' => $transaction];
    }

    /**
     * Handled on callback of IPN
     *
     * @param Request $request
     */
    public function validateIpn (Request $request)
    {
        try {
            /** @var Ipn $ipn */
            $ipn = \Coinpayments::validateIPNRequest($request);

            // if the ipn came from the API side of coinpayments merchant
            if ($ipn->isApi()) {

                /*
                 * If it makes it into here then the payment is complete.
                 * So do whatever you want once the completed
                 */

                // do something here
                // Payment::find($ipn->txn_id);
            }
        }
        catch (IpnIncompleteException $e) {
            $ipn = $e->getIpn();
            /*
             * Can do something here with the IPN model if desired.
             */
        }
    }
}