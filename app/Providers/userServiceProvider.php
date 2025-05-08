<?php

namespace App\Providers;

use App\Models\Categorie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class userServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer('*',function($view)
        {
            $user = Auth::user();
            $view->with('user', $user);
        });
        view()->composer('*',function($view)
        {
            $categories = Categorie::all();
            $view->with('categories', $categories);
        });
    }
}
