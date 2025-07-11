<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, etc.
     */
    public function boot(): void
    {
        $this->routes(function () {
            // 🔵 ROUTE API: untuk /api/*
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            // 🟢 ROUTE WEB: untuk route biasa / admin panel dll
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
}
