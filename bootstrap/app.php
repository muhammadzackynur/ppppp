<?php

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        // api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Penanganan untuk pengguna yang belum login (unauthenticated)
        $exceptions->render(function (AuthenticationException $e, Request $request) {
            // Jika permintaan adalah API atau mengharapkan JSON (misalnya pakai Postman)
            if ($request->is('api/*') || $request->expectsJson()) {
                return response()->json([
                    'message' => 'Unauthenticated. Silakan login atau gunakan API token yang valid.'
                ], 401);
            }

            // Untuk permintaan web biasa, redirect langsung ke /admin/login
            return redirect()->guest('/admin/login');
        });
    })
    ->create();
