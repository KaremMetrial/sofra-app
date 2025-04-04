<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RestaurantController;

Route::prefix('v1')->group(function () {
  Route::get('restaurant', [RestaurantController::class, 'index']);
});
