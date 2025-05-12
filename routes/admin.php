<?php

use App\Http\Controllers\Admin\AdminDashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\AdminSkinToneController as AdminSkinToneController;
use App\Http\Controllers\Admin\AdminUsersController as AdminUsersController;
use App\Http\Controllers\Admin\AdminPersonalColorController as AdminPersonalColorController;
use App\Http\Controllers\Admin\AdminProductBrandController as AdminProductBrandController;
use App\Http\Controllers\Admin\AdminProductTypeController as AdminProductTypeController;
use App\Http\Controllers\Admin\AdminProductController as AdminProductController;
use App\Http\Controllers\Admin\AdminProductRecomendationController as AdminProductRecomendationController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::prefix('administration')->name('admin.')->group(function () {
        Route::resource('dashboard', AdminDashboardController::class);
        Route::resource('users', AdminUsersController::class);
        Route::resource('skin-tone', AdminSkinToneController::class);
        Route::resource('personal-color', AdminPersonalColorController::class);
        Route::resource('product', AdminProductController::class);
        Route::resource('product-brand', AdminProductBrandController::class);
        Route::resource('product-type', AdminProductTypeController::class);
        Route::resource('product-recommendation', AdminProductRecomendationController::class);
    });
});
