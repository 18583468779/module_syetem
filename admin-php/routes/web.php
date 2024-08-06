<?php

use App\Models\User;
use App\Notifications\EmailValidateCodeNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return "about";
});


Route::get('/test', function () {
    Notification::send(User::factory()->make(), new EmailValidateCodeNotification(1235));
    // return (new EmailValidateCodeNotification())->toMail(User::factory()->make());
});