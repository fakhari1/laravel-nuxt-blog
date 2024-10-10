<?php

namespace Modules\Content\Providers;

use Illuminate\Support\ServiceProvider;

class ContentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(modules_path('Content/Database/Migrations'));
        $this->loadRoutesFrom(modules_path('Content/Routes/content_routes.php'));
    }
}
