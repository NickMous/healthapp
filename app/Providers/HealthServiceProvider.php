<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use QueueSizeCheck\QueueSizeCheck;
use Spatie\Health\Checks\Checks\CacheCheck;
use Spatie\Health\Checks\Checks\DatabaseCheck;
use Spatie\Health\Checks\Checks\OptimizedAppCheck;
use Spatie\Health\Checks\Checks\QueueCheck;
use Spatie\Health\Checks\Checks\RedisCheck;
use Spatie\Health\Checks\Checks\RedisMemoryUsageCheck;
use Spatie\Health\Checks\Checks\UsedDiskSpaceCheck;
use Spatie\Health\Facades\Health;
use Spatie\SecurityAdvisoriesHealthCheck\SecurityAdvisoriesCheck;

class HealthServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     */
    public function register(): void
    {
        Health::checks([
            CacheCheck::new(),
            OptimizedAppCheck::new(),
            UsedDiskSpaceCheck::new(),
            DatabaseCheck::new(),
            QueueSizeCheck::new()
                          ->queue('static_cache', 3)
                          ->queue('default', 100),
            RedisCheck::new(),
            RedisMemoryUsageCheck::new(),
            SecurityAdvisoriesCheck::new(),
        ]);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
