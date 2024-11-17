<?php

namespace Mertcanaydin97\LaravelPaytr\Providers;
use Mertcanaydin97\LaravelPaytr\LaravelPaytr;
use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client;
use Mertcanaydin97\LaravelPaytr\Exceptions\InvalidConfig;

class PackageServiceProvider extends ServiceProvider
{
    public function boot()
    {

        $this->app->bind('laravel-paytr', function () {
            return new LaravelPaytr;
        });
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../views', 'laravelpaytr');
        $this->publishes([
            __DIR__ . '/../config/laravel-paytr.php' => config_path('laravel-paytr.php'),

        ], 'config');
        $this->publishes(
            [
                __DIR__ . '/..//views' => resource_path('views/vendor/laravel-paytr'),

            ],
            'view'
        );
        $this->publishes([
            __DIR__ . '/../public/assets' => public_path('vendor/laravel-paytr'),

        ], 'public');


    }

    public function register()
    {
        $this->app->singleton(Paytr::class, function ($app) {
            $config = config('paytr');
            if (is_null($config)) {
                throw InvalidConfig::configNotFound();
            }

            $client = new Client([
                'base_uri' => $config['options']['base_uri'],
                'timeout' => $config['options']['timeout'],
            ]);
            return new LaravelPaytr($client, $config['credentials'], $config['options']);
        });
    }
}
