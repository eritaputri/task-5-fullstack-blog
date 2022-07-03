<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=> 'Erita',
            'username'=> 'erita',
            'email'=>'erita@gmail.com',
            'password'=>bcrypt('123456')
        ]);
        User::create([
            'name'=> 'Putri',
            'username'=> 'putri',
            'email'=>'putri@gmail.com',
            'password'=>bcrypt('123456')
        ]);
        User::create([
            'name'=> 'Ramadhani',
            'username'=> 'ramadhani',
            'email'=>'ramadhani@gmail.com',
            'password'=>bcrypt('123456')
        ]);
    }
}
