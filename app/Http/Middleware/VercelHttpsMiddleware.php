<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class VercelHttpsMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Force HTTPS URLs in production
        if (config('app.env') === 'production' || config('app.force_https', false)) {
            URL::forceScheme('https');
        }

        // Set proper headers for session cookies on Vercel
        if ($request->hasSession()) {
            // Ensure session cookie settings are correct for production
            $sessionConfig = config('session');
            
            // Override session cookie settings for Vercel
            if (str_contains(config('app.url'), 'vercel.app')) {
                config([
                    'session.secure' => true,
                    'session.same_site' => 'lax',
                    'session.domain' => '.vercel.app',
                    'session.http_only' => true,
                ]);
            }
        }

        $response = $next($request);

        // Add security headers for better cookie handling
        if (config('app.env') === 'production') {
            $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
            $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
            $response->headers->set('X-Content-Type-Options', 'nosniff');
            $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        }

        return $response;
    }
}
