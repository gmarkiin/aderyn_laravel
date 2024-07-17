<?php

namespace Tests\Feature;

use Faker\Factory;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function testCreateUserWithSuccess(): void
    {
        $data = [
            'username' => Factory::create()->userName(),
            'email' => Factory::create()->email(),
            'password' => Factory::create()->password(),
        ];
        $response = $this->postJson('/api/user/create', $data);


        $response->assertStatus(201);
    }

    /**
     * A basic test example.
     */
    public function testCreateUserWithValidationFailed(): void
    {
        $data = [];
        $response = $this->postJson('/api/user/create', $data);

        $response
            ->assertStatus(422)
            ->assertJson([
                'message' => 'O nome de usuário é obrigatório (and 2 more errors)',
                'errors' => [
                    'username' => ['O nome de usuário é obrigatório'],
                    'email' => ['O e-mail é obrigatório'],
                    'password' => ['A senha é obrigatória'],
                ]
            ]);
    }
}
