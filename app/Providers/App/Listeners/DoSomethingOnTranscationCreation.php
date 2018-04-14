<?php

namespace App\Providers\App\Listeners;

use App\Providers\Kevupton\LarvelCoinpayments\Events\Transaction\TransactionCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DoSomethingOnTranscationCreation
{
    public function __construct()
    {
        //
    }

    public function handle(TransactionCreated $event)
    {
        $trx = $event->transaction->toArray();
        $myfile = file_put_contents('transaction.txt', $trx.PHP_EOL , FILE_APPEND | LOCK_EX);
        // var_dump($event->transaction->toArray());
    }
}
