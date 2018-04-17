<?php

namespace App\Providers;

use App\SiteSetting;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Carbon::setLocale('ru');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        View::share('_settings', new SiteSetting(__DIR__.'/../../settings.xml'));
    }
}
