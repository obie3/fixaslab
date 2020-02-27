<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CustomerProfileServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\CustomerProfile\CustomerProfileContract',
            'App\Repositories\CustomerProfile\EloquentCustomerProfileRepository');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
