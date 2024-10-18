<?php

namespace Modules\Identity\ACL\Models;

use Modules\Identity\ACL\Models\Traits\Permission\RoleConstants;
use Spatie\Permission\Models\Role as BaseRole;

class Role extends BaseRole
{
    use RoleConstants;
}
