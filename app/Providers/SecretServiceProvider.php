<?php

namespace App\Providers;

use App\Services\Secrets\DeleteSecretService;
use App\Services\Secrets\Interfaces\DeleteSecretInterface;
use App\Services\Secrets\Interfaces\GetSecretInterface;
use App\Services\Secrets\GetSecretService;
use App\Services\Secrets\Interfaces\StoreSecretInterface;
use App\Services\Secrets\StoreSecretService;
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
        $this->app->bind(DeleteSecretInterface::class, DeleteSecretService::class);
        $this->app->bind(GetSecretInterface::class, GetSecretService::class);
        $this->app->bind(StoreSecretInterface::class, StoreSecretService::class);
    }
}
