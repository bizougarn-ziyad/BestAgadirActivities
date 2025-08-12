<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Log;

class VercelServiceProvider extends ServiceProvider
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
        // Only apply Vercel-specific configurations in production environment
        if (!$this->app->environment('production')) {
            return;
        }

        // Force HTTPS in production
        if (config('app.force_https', false)) {
            URL::forceScheme('https');
            
            Log::info('Forced HTTPS scheme for production environment');
        }

        // Configure session for Vercel deployment
        if (str_contains(config('app.url', ''), 'vercel.app')) {
            $this->configureVercelSession();
        }
    }

    /**
     * Configure session settings specifically for Vercel deployment
     */
    protected function configureVercelSession(): void
    {
        // Override session configuration for Vercel
        config([
            'session.driver' => 'cookie',
            'session.secure' => true,
            'session.same_site' => 'lax',
            'session.domain' => '.vercel.app',
            'session.http_only' => true,
            'session.encrypt' => false,
            'session.lifetime' => 120,
        ]);

        Log::info('Configured Vercel session settings', [
            'driver' => config('session.driver'),
            'secure' => config('session.secure'),
            'same_site' => config('session.same_site'),
            'domain' => config('session.domain'),
        ]);
    }
}
