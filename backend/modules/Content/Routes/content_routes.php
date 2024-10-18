<?php

use Illuminate\Support\Facades\Route;
use Modules\Content\Commands\Article\StoreImage;

Route::prefix('api/content')->middleware(['auth:sanctum'])->group(function () {

    Route::post('articles/images/upload', StoreImage::class);

});
