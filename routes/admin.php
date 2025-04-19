<?php

use App\Http\Controllers\admin\AdminDashboardController as AdminDashboardController;

use Illuminate\Support\Facades\Route;

Route::get("/administration", [AdminDashboardController::class, 'index'])->name('admin.index');
