<?php

use Illuminate\Support\Facades\Route;
use Modules\Content\Commands\Article\StoreImage;
use Modules\Content\Commands\Article\UpdateArticle;
use Modules\Content\Queries\Article\GetArticle;
use Modules\Content\Commands\Article\DeleteArticle;

Route::prefix('api/content/articles')->middleware(['auth:sanctum'])->group(function () {
    Route::post('images/upload', StoreImage::class);
    Route::put('update', UpdateArticle::class);
    Route::post('get', GetArticle::class);
    Route::delete('delete', DeleteArticle::class);
});
