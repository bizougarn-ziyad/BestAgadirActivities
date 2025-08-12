<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HandleCorsAndCsrf
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Set CORS headers for production
        if (app()->environment('production')) {
            $response->headers->set('Access-Control-Allow-Origin', 'https://vala-project-agadir.vercel.app');
            $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
            $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-CSRF-TOKEN, X-Requested-With');
            $response->headers->set('Access-Control-Allow-Credentials', 'true');
        }

        // Handle preflight OPTIONS requests
        if ($request->getMethod() === "OPTIONS") {
            $response->setStatusCode(200);
            return $response;
        }

        return $response;
    }
}
