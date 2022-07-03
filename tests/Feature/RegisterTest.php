<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_register()
    {
        //create user
        $user =User::create([
            'name' => 'nizar',
            'username' => 'nizar',
            'email' => 'nizar@gmail.com',
            'password' => bcrypt('123456789'),
        ])->toArray();
        $response = $this->post('/register', $user);
        $this->assertDatabaseHas('users', $user);
    }
}
