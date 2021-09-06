<?php

namespace App\Providers;

use App\Events\CustomerCreated;
use App\Events\OrderCreatedEvent;
use App\Events\OrderDelivered;
use App\Listeners\SaveFreeProductDetailOnOrderCreated;
use App\Listeners\CustomerCreatedListener;
use App\Listeners\OnSubscriptionCreateListener;
use App\Listeners\OrderCreateSendSMSListener;
use App\Listeners\OrderCreateSendEmailListener;
use App\Listeners\OrderDeliveredSendEmailListener;
use App\Listeners\OrderDeliveredSendSMSListener;
use App\Listeners\UpdateDiscountsOnOrderCreated;
use App\Listeners\UpdateGoldMembershipOnOrderCreated;
use App\Listeners\UpdateWalletOnOrderCreated;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        OrderCreatedEvent::class => [
            OrderCreateSendSMSListener::class,
            OrderCreateSendEmailListener::class,
            UpdateWalletOnOrderCreated::class,
            UpdateDiscountsOnOrderCreated::class,
            UpdateGoldMembershipOnOrderCreated::class,
            SaveFreeProductDetailOnOrderCreated::class
        ],
        OrderDeliveredEvent::class => [
            OrderDeliveredSendEmailListener::class,
            OrderDeliveredSendSMSListener::class
        ],
        CustomerCreated::class => [
            CustomerCreatedListener::class
        ]
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
