<?php

namespace Modules\Identity\ACL\Models\Traits\Permission;

trait PermissionConstants
{
    const PERMISSION_VIEW_ARTICLES = 'view articles';
    const PERMISSION_VIEW_OWN_ARTICLES = 'view own articles';
    const PERMISSION_MANAGE_ARTICLES = 'manage articles';
    const PERMISSION_MANAGE_OWN_ARTICLES = 'manage own articles';

    const PERMISSION_VIEW_PERMISSIONS = 'view permissions';
    const PERMISSION_MANAGE_PERMISSIONS = 'manage permissions';
    const PERMISSION_VIEW_ROLES = 'view roles';
    const PERMISSION_MANAGE_ROLES = 'manage roles';

    public array $permissions = [
        self::PERMISSION_VIEW_ARTICLES,
        self::PERMISSION_VIEW_OWN_ARTICLES,
        self::PERMISSION_MANAGE_ARTICLES,
        self::PERMISSION_MANAGE_OWN_ARTICLES,
        self::PERMISSION_VIEW_PERMISSIONS,
        self::PERMISSION_MANAGE_PERMISSIONS,
        self::PERMISSION_VIEW_ROLES,
        self::PERMISSION_MANAGE_ROLES,
    ];
}
