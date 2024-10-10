<?php

use Illuminate\Support\Facades\Route;
use Modules\Identity\Auth\Livewire\Register;
use Modules\Identity\Auth\Livewire\Login;

Route::middleware(['api', 'guest:api'])->group(function () {
    Route::post('register', RegisterUser::class);
    Route::post('login', LoginUser::class);
});

Route::middleware(['api', 'auth:sanctum'])->group(function () {
    Route::get('/auth/user', GetAuthUserResource::class);
    Route::post('logout', LogoutUser::class);
});
