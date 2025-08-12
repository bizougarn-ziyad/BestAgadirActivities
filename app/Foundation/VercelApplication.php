<?php

namespace App\Foundation;

use Illuminate\Foundation\Application as BaseApplication;

class VercelApplication extends BaseApplication
{
    /**
     * Get the path to the bootstrap/cache directory.
     */
    public function bootstrapPath($path = '')
    {
        // Use /tmp for bootstrap cache in serverless environment
        if ($this->runningInServerlessEnvironment()) {
            $bootstrapPath = '/tmp/bootstrap';
            
            // Ensure the directory exists
            if (!is_dir($bootstrapPath)) {
                mkdir($bootstrapPath, 0755, true);
            }
            
            return $bootstrapPath.($path != '' ? DIRECTORY_SEPARATOR.$path : $path);
        }
        
        return parent::bootstrapPath($path);
    }

    /**
     * Get the path to the storage directory.
     */
    public function storagePath($path = '')
    {
        // Use /tmp for storage in serverless environment
        if ($this->runningInServerlessEnvironment()) {
            $storagePath = '/tmp/storage';
            
            // Ensure the directory exists
            if (!is_dir($storagePath)) {
                mkdir($storagePath, 0755, true);
            }
            
            return $storagePath.($path != '' ? DIRECTORY_SEPARATOR.$path : $path);
        }
        
        return parent::storagePath($path);
    }

    /**
     * Determine if the application is running in a serverless environment.
     */
    protected function runningInServerlessEnvironment(): bool
    {
        return isset($_ENV['VERCEL']) || 
               isset($_ENV['AWS_LAMBDA_FUNCTION_NAME']) || 
               $this->environment('production') && 
               (str_contains($this->make('config')->get('app.url', ''), 'vercel.app') ||
                !is_writable($this->basePath('bootstrap/cache')));
    }
}
