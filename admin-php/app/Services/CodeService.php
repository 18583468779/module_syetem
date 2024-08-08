<?php

namespace App\Services;

use Illuminate\Support\Facades\Notification;
use App\Models\User;
use App\Notifications\EmailValidateCodeNotification;

class CodeService
{
    protected $account;
    public function send(string | int $account)
    {
        $this->account = $account;
        $action = filter_var($account, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
        $this->$action();
    }

    protected function email()
    {
        Notification::send(User::factory()->make(['email' => $this->account]), new EmailValidateCodeNotification(3124));
    }

    protected function mobile()
    {
    }
}