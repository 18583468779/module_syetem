<?php

use App\Models\User;
use App\Notifications\EmailValidateCodeNotification;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return "about";
});


Route::get('/test', function () {
    return (new EmailValidateCodeNotification())->toMail(User::factory()->make());
});
