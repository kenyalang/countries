<?php

namespace Kenyalang\Countries;

use Illuminate\Support\ServiceProvider;

class CountriesServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->mergeConfigFrom(__DIR__.'/../config/countries.php', 'countries');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/countries.php' => config_path('countries.php'),
            ], 'config');
        }
    }
}
