<?php

use Illuminate\Support\Facades\Route;

Route::prefix('api')->middleware(['api'])->group(function () {

    Route::get('/', function () {
        dd('hello world');
    });

});
