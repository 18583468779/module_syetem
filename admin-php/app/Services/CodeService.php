<?php

namespace App\Services;

use Illuminate\Support\Facades\Notification;
use App\Models\User;
use App\Notifications\EmailValidateCodeNotification;
use Illuminate\Support\Facades\Cache;

class CodeService
{
    protected $account;
    public function send(string | int $account)
    {
        $this->account = $account;
        $action = filter_var($account, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
        if (Cache::get($this->account)) abort(403, '验证码已发送');
        $this->$action();
    }

    protected function email()
    {
        $code = mt_rand(1000, 9999);
        Cache::put($this->account, $code);
        Notification::send(User::factory()->make(['email' => $this->account]), new EmailValidateCodeNotification($code));
    }

    protected function mobile()
    {
    }
}