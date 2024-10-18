<?php

namespace Modules\Content\Policies;

use Illuminate\Contracts\Auth\Authenticatable;
use Modules\Content\Models\Article;
use Modules\Identity\ACL\Models\Permission;
use Modules\Identity\User\Models\User;

class ArticlePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Article $article): bool
    {
        return $article->user_id == $user->id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User|Authenticatable $user, Article $article): bool
    {
        return
            $user->hasPermissionTo(Permission::PERMISSION_MANAGE_ARTICLES)
            ||
            $user->hasPermissionTo(Permission::PERMISSION_MANAGE_OWN_ARTICLES);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Article $article): bool
    {
        return $user->id == $article->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Article $article): bool
    {
        return $user->id == $article->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Article $article): bool
    {
        return $user->id == $article->user_id;
    }
}
