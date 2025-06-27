<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Paginator::useBootstrapFive();
        //Policy untuk akses admin
        Gate::define('delete', function($user){
            return $user->role === 'admin';
        });
        Gate::define('edit', function($user){
            return $user->role === 'admin';
        });
        Gate::define('create', function($user){
            return $user->role === 'admin';
        });
    }
}
