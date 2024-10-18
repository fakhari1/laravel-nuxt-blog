<?php

return [
    App\Providers\AppServiceProvider::class,
    Spatie\Permission\PermissionServiceProvider::class,

    Modules\Content\Providers\ContentServiceProvider::class,
    Modules\Identity\Auth\Providers\AuthServiceProvider::class,
    Modules\Identity\User\Providers\UserServiceProvider::class,
    Modules\Identity\ACL\Providers\AclServiceProvider::class,



];
