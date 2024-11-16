<?php

namespace Mertcanaydin97\LaravelPaytr\Providers;

use Illuminate\Support\ServiceProvider;
class PackageServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../views', 'laravelpaytr');
        $this->publishes([
            __DIR__ . '/../config/laravel-paytr.php' => config_path('laravel-paytr.php')
        ], 'config');


    }

    public function register()
    {
    }
}
