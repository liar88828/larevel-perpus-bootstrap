<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        // Paginator::defaultView('');
        // Paginator::useBootstrapFive();
        // Paginator::defaultView('vendor.pagination.boostrap-5');
        Paginator::defaultView('vendor.pagination.default');
        // Paginator::defaultSimpleView('vendor.pagination.simple-default');
        Model::unguard();
    }
}