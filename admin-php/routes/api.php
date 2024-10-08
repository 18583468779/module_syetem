<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ValidateCodeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('register', RegisterController::class);

Route::post('login', LoginController::class);

Route::post('code/guest', [ValidateCodeController::class, 'guest']);
