<?php

namespace App\Providers\App\Listeners;

use App\Providers\Kevupton\LarvelCoinpayments\Events\Transaction\TransactionUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DoSomethingOnTranscationUpdate
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
     * @param  TransactionUpdated  $event
     * @return void
     */
    public function handle(TransactionUpdated $event)
    {
        var_dump($event->deposit->toArray());
    }
}
