<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],
        Kevupton\LarvelCoinpayments\Events\Transaction\TransactionCreated::class => [
            App\Listeners\DoSomethingOnTranscationCreation::class, // your own class listener for transaction creation
        ],
        Kevupton\LarvelCoinpayments\Events\Transaction\TransactionUpdated::class => [
            App\Listeners\DoSomethingOnTranscationUpdate::class, // your own class listener for transaction update (more confirmations)
        ],
        Kevupton\LarvelCoinpayments\Events\Transaction\TransactionComplete::class => [
            App\Listeners\DoSomethingOnTranscationComplete::class, // your own class listener for transaction finalization
        ],
    ];
   
    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
