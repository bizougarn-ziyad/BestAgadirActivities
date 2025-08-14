<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Check if user is admin and redirect to admin dashboard
                if (session('is_admin') || Auth::guard('admin')->check()) {
                    return redirect()->route('admin.dashboard');
                }
                
                // Regular authenticated users go to home page
                return redirect('/');
            }
        }

        // Also check admin guard specifically
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }

        // Add no-cache headers to prevent browser caching of auth pages
        $response = $next($request);
        
        if ($response instanceof \Illuminate\Http\Response || $response instanceof \Illuminate\Http\RedirectResponse) {
            $response->headers->set('Cache-Control', 'no-cache, no-store, must-revalidate, max-age=0');
            $response->headers->set('Pragma', 'no-cache');
            $response->headers->set('Expires', 'Fri, 01 Jan 1990 00:00:00 GMT');
        }
        
        return $response;
    }
}
