<?php

namespace App\Providers;

use App\Services\Secrets\Interfaces\SecretInterface;
use App\Services\Secrets\SecretService;
use Illuminate\Support\ServiceProvider;

class SecretServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(SecretInterface::class, SecretService::class);
    }
}
