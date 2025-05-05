<?php

use App\Http\Controllers\Client\ClientHomeController as ClientHomeController;
use App\Http\Controllers\Client\ClientProductRecomendationController as ClientProductRecomendationController;
use App\Http\Controllers\Client\ClientShadeHuntController as ClientShadeHuntController;
use Illuminate\Support\Facades\Route;

Route::resource('/', ClientHomeController::class);
Route::resource('product-recommendation', ClientProductRecomendationController::class);
Route::resource('shade-hunt', ClientShadeHuntController::class);
