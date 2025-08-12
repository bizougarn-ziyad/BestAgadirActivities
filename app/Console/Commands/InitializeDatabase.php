<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InitializeDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:init {--force : Force initialization even if tables exist}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize database for production deployment';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $this->info('Initializing database...');
            
            // Check if database file exists
            $dbPath = config('database.connections.sqlite.database');
            $this->info("Database path: {$dbPath}");
            
            if (!file_exists($dbPath)) {
                $this->info('Creating database file...');
                $dir = dirname($dbPath);
                if (!is_dir($dir)) {
                    mkdir($dir, 0755, true);
                }
                touch($dbPath);
            }
            
            // Test database connection
            DB::connection()->getPdo();
            $this->info('Database connection successful');
            
            // Run migrations if tables don't exist or force is used
            if (!Schema::hasTable('user_data') || $this->option('force')) {
                $this->info('Running migrations...');
                $this->call('migrate', ['--force' => true]);
            }
            
            $this->info('Database initialization completed successfully');
            return 0;
            
        } catch (\Exception $e) {
            $this->error('Database initialization failed: ' . $e->getMessage());
            return 1;
        }
    }
}
