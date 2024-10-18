<?php

use Illuminate\Support\Facades\Route;
use Modules\Content\Commands\Article\StoreImage;
use Modules\Content\Commands\Article\UpdateArticle;

Route::prefix('api/content')->middleware(['auth:sanctum'])->group(function () {

    Route::post('articles/images/upload', StoreImage::class);
    Route::put('articles/update', UpdateArticle::class);
});
