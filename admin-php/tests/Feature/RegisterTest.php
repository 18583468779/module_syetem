<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase; //帮助我们初始化数据库
    /**
     * 用户注册.
     */
    public function test_userRegister(): void
    {
        $response = $this->post('/api/register', [
            'email' => '112365405@qq.com',
            'password' => 'ai11'
        ]);

        $response->assertStatus(201);
    }
}