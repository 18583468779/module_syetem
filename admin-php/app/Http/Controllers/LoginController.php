<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request)
    {

        $user = User::where('email', $request->account)->first();
        if (!$user) {
            throw ValidationException::withMessages([
                'email' => '用户不存在'
            ]);
        }
        if (!Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'password' => '密码输入错误'
            ]);
        }
        return [
            'token' => $user->createToken('auth')->plainTextToken,
            'flag' => 0,
            'user' => $user
        ];
    }
}
