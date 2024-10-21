<?php

namespace App\Providers;

use App\Services\PaymentGateway;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use View;

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
        Paginator::useBootstrap();

        View::share('site_name', 'My Laravel Blog');
    }
}
