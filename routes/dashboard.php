<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\NotificationController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->middleware(['lang', 'auth'])->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/roles', RoleController::class);

    Route::resource('/users', UserController::class);
    Route::put('/aprove-blogger/{id}', [UserController::class, 'AproveBlogger'])->name('aprove.blogger');

    // PROFILE
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // RESETING PASSWORD
    Route::get('user-reset-password', [UserController::class, 'createResetPassword'])->name('create.reset.password');
    Route::put('user-reset-password', [UserController::class, 'resetPassword'])->name('user.reset.password');

    Route::resource('/posts', PostController::class);
    Route::post('/post-change-status', [PostController::class, 'changeStatus'])->name('post.changeStatus');

    // NOTIFICATIONS
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/notifications/{id}', [NotificationController::class, 'show'])->name('notifications.show');
});
