<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class ValidateCodeRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'account' =>  $this->accountRule(),
        ];
    }

    protected function accountRule()
    {
        if (filter_var(request('account'), FILTER_VALIDATE_EMAIL)) {
            return 'required|email';
        }

        return ['required', 'regex:/^\d{11}$/'];
    }
}
