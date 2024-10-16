<?php

use Illuminate\Support\Facades\Route;
use Modules\Identity\User\Commands\UpdateUser;

Route::prefix('api')
    ->middleware(['auth:sanctum'])
    ->group(function () {

    Route::put('users/update', UpdateUser::class);

});
