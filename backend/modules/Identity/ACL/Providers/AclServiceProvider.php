<?php

namespace Modules\Identity\ACL\Providers;

use App\Livewire\CreatePost;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use Livewire\Livewire;

class AclServiceProvider extends ServiceProvider
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
        $this->loadMigrationsFrom(modules_path('Identity/ACL/Database/Migrations'));
        $this->loadRoutesFrom(modules_path('Identity/ACL/Routes/acl_routes.php'));
    }

}
