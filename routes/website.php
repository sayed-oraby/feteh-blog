<?php

use App\Http\Controllers\Website\CommentController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\PostController;
use Illuminate\Support\Facades\Route;

Route::prefix('blog')->group(function(){
    Route::get('/articles', [PostController::class, 'index'])->name('articles.index');
    Route::get('/articles/{id}', [PostController::class, 'show'])->name('articles.show');

    Route::resource('/comments', CommentController::class);
    Route::get('/search', [PostController::class, 'search'])->name('search');
});
