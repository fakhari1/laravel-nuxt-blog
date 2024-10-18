<?php

namespace Modules\Identity\ACL\Models\Traits\Permission;

trait RoleConstants
{
    const ROLE_SUPER_ADMIN = 'super admin';
    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';


    public array $roles = [
        self::ROLE_SUPER_ADMIN,
        self::ROLE_ADMIN,
        self::ROLE_USER
    ];
}
