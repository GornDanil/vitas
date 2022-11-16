<?php

namespace App\Providers;

use App\Services\Contracts\AuthService;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    public array $singletons = [
        AuthService::class => \App\Services\AuthService::class
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

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
