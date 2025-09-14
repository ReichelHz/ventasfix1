<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class LoginApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_with_valid_credentials_returns_token()
    {
        $user = User::factory()->create([
            'email' => 'testuser@ventasfix.cl',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->postJson('/api/login', [
            'email' => 'testuser@ventasfix.cl',
            'password' => 'password123',
        ]);

        $response->assertStatus(200)
                 ->assertJsonStructure(['token', 'user']);
    }

    public function test_login_with_invalid_credentials_returns_401()
    {
        $user = User::factory()->create([
            'email' => 'testuser@ventasfix.cl',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->postJson('/api/login', [
            'email' => 'testuser@ventasfix.cl',
            'password' => 'wrongpassword',
        ]);

        $response->assertStatus(401)
                 ->assertJson(['message' => 'Credenciales incorrectas.']);
    }
}
