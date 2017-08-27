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

        'Artem328\LaravelYandexKassa\Events\BeforeCheckOrderResponse' => [
            'App\Listeners\CheckOrderRequisites',
            // You can add more than one listener and every
            // listener can return own parameters. Incoming
            // parameters WILL NOT extend. But response
            // parameters WILL override in listeners order
            // 'App\Listeneres\AddCheckOrderRecord',
        ],
        'Artem328\LaravelYandexKassa\Events\BeforePaymentAvisoResponse' => [
            'App\Listeners\ChangeOrderStatusWhenPaymentSuccessful',
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
