<?php

namespace Modules\Identity\User\Providers;

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(modules_path('Identity/User/Database/Migrations'));
        $this->loadRoutesFrom(modules_path('Identity/User/Routes/user_routes.php'));
    }
}
