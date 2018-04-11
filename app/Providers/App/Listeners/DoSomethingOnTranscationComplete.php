<?php

namespace App\Providers\App\Listeners;

use App\Providers\Kevupton\LarvelCoinpayments\Events\Transaction\TransactionComplete;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DoSomethingOnTranscationComplete
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  TransactionComplete  $event
     * @return void
     */
    public function handle(TransactionComplete $event)
    {
        var_dump($event->deposit->toArray());
    }
}
