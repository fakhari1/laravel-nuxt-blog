<?php

namespace Modules\Identity\ACL\Models;

use Modules\Identity\ACL\Models\Traits\Permission\PermissionConstants;
use Spatie\Permission\Models\Permission as BasePermission;

class Permission extends BasePermission
{
    use PermissionConstants;

}
