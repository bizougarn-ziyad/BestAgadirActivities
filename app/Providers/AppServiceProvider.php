<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
        // Force HTTPS URLs in production
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
        
        // Force HTTPS if APP_FORCE_HTTPS is set
        if (config('app.force_https', false)) {
            URL::forceScheme('https');
        }
        
        // Ensure SQLite database exists in production
        $this->ensureSQLiteDatabase();
    }
    
    /**
     * Ensure SQLite database file exists and is accessible
     */
    private function ensureSQLiteDatabase(): void
    {
        if (config('database.default') === 'sqlite' && config('app.env') === 'production') {
            try {
                // Try to run our database initialization command
                \Illuminate\Support\Facades\Artisan::call('db:init');
            } catch (\Exception $e) {
                // Log error but don't break the application
                \Illuminate\Support\Facades\Log::error('Database initialization failed: ' . $e->getMessage());
            }
        }
    }
    
    /**
     * Run database migrations
     */
    private function runMigrations(): void
    {
        try {
            \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
        } catch (\Exception $e) {
            // Log error but don't break the application
            \Illuminate\Support\Facades\Log::error('Migration failed: ' . $e->getMessage());
        }
    }
}
