<?php

namespace App\Providers;

use App\Post;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        // Using Closure based composers...
        View::composer('_partials._aside_recent_articles', function ($view) {
            return $view->with('latestPosts', Post::published()->latest()->take(5)->get());
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}