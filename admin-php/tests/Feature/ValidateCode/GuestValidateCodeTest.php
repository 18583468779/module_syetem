<?php



use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GuestValidateCodeTest extends TestCase
{
    /**
     * @test
     */
    public function test_ValidateCodeTest(): void
    {
        $user = User::factory()->make();
        $this->post('/api/code/guest', [
            'account' => $user->email
        ])->assertOk();
    }
}
