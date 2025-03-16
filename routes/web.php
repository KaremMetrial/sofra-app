<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\{
  HomeController,
};

Route::group(['prefix' => 'admin', 'as' => 'admin.'],function() {
  Route::get('/',[ HomeController::class, 'index'])->name('index');
});
