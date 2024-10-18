<?php

namespace Modules\Content\Providers;

use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Modules\Content\Models\Article;
use Modules\Content\Policies\ArticlePolicy;
use Modules\Identity\ACL\Models\Role;
use Modules\Identity\User\Models\User;

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

        Gate::before(function (User $user) {
            return $user->hasRole(Role::ROLE_SUPER_ADMIN);
        });

        Gate::policy(Article::class, ArticlePolicy::class);
    }
}
