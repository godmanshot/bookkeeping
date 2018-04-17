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
        $this->app->singleton('site-setting', function ($app) {
            return new SiteSetting(__DIR__.'/../../settings.xml');
        });
        $this->app->singleton('site-block', function ($app) {
            return new SiteSetting(__DIR__.'/../../site-block.xml');
        });
        View::share('_settings', resolve('site-setting'));
        View::share('_blocks', resolve('site-block'));
    }
}
