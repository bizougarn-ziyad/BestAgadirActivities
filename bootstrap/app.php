<?php

use App\Foundation\VercelApplication;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return VercelApplication::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->web(append: [
            \App\Http\Middleware\EnsureBootstrapCache::class,
            \App\Http\Middleware\VercelHttpsMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // Log exceptions for debugging on Vercel
        $exceptions->render(function (Throwable $e, $request) {
            if (config('app.debug')) {
                error_log('Laravel Exception: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine());
                
                // Return JSON error for debugging if requested
                if ($request->wantsJson() || $request->is('api/*')) {
                    return response()->json([
                        'error' => $e->getMessage(),
                        'file' => $e->getFile(),
                        'line' => $e->getLine(),
                        'trace' => $e->getTraceAsString()
                    ], 500);
                }
            }
        });
    })->create();
