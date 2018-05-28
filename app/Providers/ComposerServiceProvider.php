<?php

namespace App\Providers;

use App\Menu;
use App\Post;
use App\Service;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layout', function ($view) {
            $view->with('menu', Menu::orderBy('place')->with('page')->get());
            $view->with('services', Service::limit(6)->get());
            $view->with('posts', Post::latest()->limit(3)->get());
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}
