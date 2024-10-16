<?php

use Illuminate\Support\Facades\Route;
use Modules\Identity\Auth\Commands\Login;
use Modules\Identity\Auth\Commands\RegisterUser;
use Modules\Identity\Auth\Queries\GetAuthUserResource;
use Modules\Identity\Auth\Commands\Logout;

Route::prefix('api')->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::post('register', RegisterUser::class);
        Route::post('login', Login::class);
    });

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get('user', GetAuthUserResource::class);
        Route::post('logout', Logout::class);
    });
});
