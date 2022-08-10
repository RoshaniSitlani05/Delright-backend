<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {

        $response = $this->postJson('api/signIn', ['email' => '9876543210', 'password' => '123456']);
        $response
            ->assertStatus(200);
    }
    public function test_check()
    {
        $response = $this->postJson('/api/check', ['phone_number' => '9876543210']);
        $response
            ->assertStatus(200);
    }
}
