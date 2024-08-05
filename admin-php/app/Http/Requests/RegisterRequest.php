<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{


    public function rules(): array
    {
        return [
            'account' =>  $this->accountRule(),
            'password' => ['required', 'min:3', 'confirmed'] // confirmed 确认密码 必须有password_confirmation字段
        ];
    }

    protected function accountRule()
    {
        if (filter_var(request('account'), FILTER_VALIDATE_EMAIL)) {
            return 'required|email|unique:users,email';
        }

        return ['required', 'regex:/^\d{11}$/', 'unique:users,mobile'];
    }
}
