<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureBootstrapCache
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Ensure bootstrap cache directory exists and is writable
        $this->ensureBootstrapCacheExists();
        
        return $next($request);
    }

    /**
     * Ensure bootstrap cache directory exists
     */
    protected function ensureBootstrapCacheExists(): void
    {
        $bootstrapCache = app()->bootstrapPath('cache');
        
        if (!is_dir($bootstrapCache)) {
            mkdir($bootstrapCache, 0755, true);
        }

        // Ensure critical cache files exist
        $requiredFiles = [
            'services.php',
            'packages.php'
        ];

        foreach ($requiredFiles as $file) {
            $filePath = $bootstrapCache . DIRECTORY_SEPARATOR . $file;
            
            if (!file_exists($filePath)) {
                // Try to copy from original location first
                $originalPath = base_path("bootstrap/cache/$file");
                
                if (file_exists($originalPath)) {
                    copy($originalPath, $filePath);
                } else {
                    // Create empty cache file
                    file_put_contents($filePath, '<?php return [];');
                }
            }
        }
    }
}
