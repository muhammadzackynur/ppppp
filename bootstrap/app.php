<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Auth\AuthenticationException; // <-- PENTING: Pastikan baris ini ada

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        
        // PENDEKATAN BARU: Menggunakan method unauthenticated()
        // Ini lebih spesifik dan seharusnya lebih kuat
        $exceptions->unauthenticated(function ($request, AuthenticationException $e) {
            // Jika request ditujukan untuk API, kembalikan response JSON
            if ($request->is('api/*')) {
                return response()->json(
                    ['message' => 'Unauthenticated.'], 
                    401
                );
            }
        });

    })->create();
