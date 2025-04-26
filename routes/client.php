<?php

use App\Http\Controllers\Client\ClientHomeController as ClientHomeController;
use Illuminate\Support\Facades\Route;

Route::resource('/', ClientHomeController::class);
