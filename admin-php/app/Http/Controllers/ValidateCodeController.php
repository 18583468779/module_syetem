<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateCodeRequest;

use App\Services\CodeService;


class ValidateCodeController extends Controller
{
    //
    public function guest(ValidateCodeRequest $request, CodeService $codeService)
    {
        $codeService->send($request->account);
    }
}