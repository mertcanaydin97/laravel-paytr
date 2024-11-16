<?php

namespace Mertcanaydin97\LaravelPaytr\Providers;
use Mertcanaydin97\LaravelPaytr\LaravelPaytr;
use Illuminate\Support\ServiceProvider;
class PackageServiceProvider extends ServiceProvider
{
    public function boot()
    {

        $this->app->bind('laravel-paytr', function() {
            return new LaravelPaytr;
        });
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../views', 'laravelpaytr');
        $this->publishes([
            __DIR__ . '/../config/laravel-paytr.php' => config_path('laravel-paytr.php'),
            __DIR__.'/..//views' => resource_path('views/vendor/laravel-paytr'),
            __DIR__.'/../public/assets' => public_path('laravelpaytr'),

        ]);


    }

    public function register()
    {
    }
}
