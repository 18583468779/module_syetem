<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateCodeRequest;
use App\Models\User;
use App\Notifications\EmailValidateCodeNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ValidateCodeController extends Controller
{
    //
    public function guest(ValidateCodeRequest $request)
    {
        Notification::send(User::factory()->make(['email' => $request->account]), new EmailValidateCodeNotification(3124));
    }
}
