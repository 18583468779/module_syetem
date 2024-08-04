<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    // 控制器被调用时自动执行
    public function __invoke(RegisterRequest $request)
    {
        $fieldName = filter_var($request->account, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';

        $user = User::create([
            $fieldName => $request->account,
            'password' => Hash::make($request->password)
        ]);

        return $user;
    }
}