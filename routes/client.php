<?php

use App\Http\Controllers\Client\ClientHomeController as ClientHomeController;
use App\Http\Controllers\Client\ClientProductRecomendationController as ClientProductRecomendationController;
use Illuminate\Support\Facades\Route;

Route::resource('/', ClientHomeController::class);
Route::resource('product-recommendation', ClientProductRecomendationController::class);
