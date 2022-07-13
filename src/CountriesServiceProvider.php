<?php

namespace Kenyalang\Countries;

use Illuminate\Support\ServiceProvider;

class CountriesServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}
