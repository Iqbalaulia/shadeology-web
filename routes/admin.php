<?php

use App\Http\Controllers\Admin\AdminDashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\AdminSkinToneController as AdminSkinToneController;
use App\Http\Controllers\Admin\AdminUsersController as AdminUsersController;
use Illuminate\Support\Facades\Route;

Route::prefix('administration')->name('admin.')->group(function () {
    Route::resource('dashboard', AdminDashboardController::class);
    Route::resource('users', AdminUsersController::class);
    Route::resource('skin-tone', AdminSkinToneController::class);
});
