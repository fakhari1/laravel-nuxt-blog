<?php

use Illuminate\Support\Facades\Route;
use Modules\Identity\User\Commands\UpdateUser;
use Modules\Identity\User\Commands\UpdateUserPassword;

Route::prefix('api')
    ->middleware(['auth:sanctum'])
    ->group(function () {

    Route::put('users/update', UpdateUser::class);
    Route::put('users/update-password', UpdateUserPassword::class);

});
