<?php

namespace App\Providers;

use App\Helpers\Interfaces\RandomStringInterface;
use App\Helpers\RandomStringHelper;
use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
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
        $this->app->bind(RandomStringInterface::class, RandomStringHelper::class);
    }
}
