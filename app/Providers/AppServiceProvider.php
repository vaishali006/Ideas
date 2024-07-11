<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        $topUsers = Cache::remember('topUsers', now()->addMinutes(2) , function(){
            return User::withcount('posts')->orderBy('posts_count','DESC')->limit(5)->get();
        });

        View::share('topUsers', $topUsers);
    }
}
