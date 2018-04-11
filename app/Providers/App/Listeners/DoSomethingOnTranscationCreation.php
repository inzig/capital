<?php

namespace App\Providers\App\Listeners;

use App\Providers\Kevupton\LarvelCoinpayments\Events\Transaction\TransactionCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DoSomethingOnTranscationCreation
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
     * @param  TransactionCreated  $event
     * @return void
     */
    public function handle(TransactionCreated $event)
    {
        var_dump($event->deposit->toArray());
    }
}
