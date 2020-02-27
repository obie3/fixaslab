<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AccountDetailServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\AccountDetail\AccountDetailContract',
            'App\Repositories\AccountDetail\EloquentAccountDetailRepository');
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
