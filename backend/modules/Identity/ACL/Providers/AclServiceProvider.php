<?php

namespace Modules\Identity\ACL\Providers;

use App\Livewire\CreatePost;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use Livewire\Livewire;
use Modules\Identity\ACL\Models\Permission;
use Modules\Identity\ACL\Models\Role;
use Modules\Identity\ACL\Policies\PermissionPolicy;
use Modules\Identity\ACL\Policies\RolePolicy;
use Modules\Identity\User\Models\User;

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

        Gate::before(function (User $user) {
            return $user->hasRole(Role::ROLE_SUPER_ADMIN);
        });

        Gate::policy(Permission::class, PermissionPolicy::class);
        Gate::policy(Role::class, RolePolicy::class);
    }

}
