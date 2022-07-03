<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login()
    {
        //create user
        $user=User::create([
            'name' => 'erkan',
            'username' => 'erkan',
            'email' => $email = 'erkan@gmail.com',
            'password' => $password = bcrypt('123456789')
        ]);
        $response = $this->actingAs($user);
        
        $response = $this->post('/login', [
            'email' => $email,
            'password' => $password,
        ]);
        $response->assertStatus(302);
        // vendor/bin/phpunit
    }
}
