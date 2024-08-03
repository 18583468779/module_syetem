<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_userRegister(): void
    {
        $response = $this->post('/api/register', [
            'email' => '1123654052@qq.com',
            'password' => 'aiaiai123456'
        ]);

        $response->assertStatus(201);
    }
}