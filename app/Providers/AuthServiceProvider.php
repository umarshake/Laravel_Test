<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Plan;
use App\Policies\PlanPolicy;

use App\Power;
use App\Policies\PowerPolicy;

use App\User;
use App\Policies\UserPolicy;

use App\Order;
use App\Policies\OrderPolicy;

use App\Subscription;
use App\Policies\SubscriptionPolicy;

use App\Message;
use App\Policies\MessagePolicy;

use App\Customer;
use App\Policies\CustomerPolicy;

use App\Discount;
use App\Policies\DiscountPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Plan::class => PlanPolicy::class,
        User::class => UserPolicy::class,
        Power::class => PowerPolicy::class,
        Order::class => OrderPolicy::class,
        Subscription::class => SubscriptionPolicy::class,
        Message::class => MessagePolicy::class,
        Customer::class => CustomerPolicy::class,
        Discount::class => DiscountPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
