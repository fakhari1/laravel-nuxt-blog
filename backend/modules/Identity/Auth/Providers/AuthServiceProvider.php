<?php

namespace Modules\Identity\Auth\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use Livewire\Livewire;
use Modules\Identity\Auth\Livewire\Login;
use Modules\Identity\Auth\Livewire\Navigation;
use Modules\Identity\Auth\Livewire\Register;

class AuthServiceProvider extends ServiceProvider
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
        $this->loadMigrationsFrom(modules_path('Identity/Auth/Database/Migrations'));
        $this->loadRoutesFrom(modules_path('Identity/Auth/Routes/auth_routes.php'));
    }

}
