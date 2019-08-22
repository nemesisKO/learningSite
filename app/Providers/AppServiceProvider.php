<?php

namespace App\Providers;

use Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('hasStartedSeries', function ($series) {
            return auth()->user()->hasStartedSeries($series);
        });
        Schema::defaultStringLength(191); //NEW: Increase StringLength
    }
}
