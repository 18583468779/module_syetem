<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    protected $data = [
        'email' => '1123654054@qq.com',
        'password' => 'aiaiai123456'
    ];
    /**
     * @test
     */
    public function userLogin(): void
    {
        $user = User::factory()->create();
        $response = $this->post('/api/login', $this->data);

        $response->assertOk();
    }
}