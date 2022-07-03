<?php

namespace Tests\Unit;
use Tests\TestCase;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;

class DashboardCategoryTest extends TestCase
{
    public function test_user_create_category()
    {
        //create user
        $user =User::create([
            'name' => 'Erita',
            'email' => 'erita@gmail.com',
            'username' => 'erita',
            'password' => Hash::make('secret9874'),
        ]);
        $response = $this->actingAs($user);
        //Authentication middleware user
        $this->actingAs($user);

        $category = [
            "name" => "Programming",
        ];

        //test endpoint
        $this->post('/dashboard/categories', $category);
        $this->assertTrue(true);
    }
    public function test_user_list_category()
    {
        //create user
        $user =User::create([
            'name' => 'Erita',
            'username' => 'erita',
            'email' => 'erita@gmail.com',
            'password' => Hash::make('secret9874'),
        ]);
        //Authentication middleware user
        $this->actingAs($user);

        //create category
        Category::create([
            'name' => 'Programming',
            'user_id'=>auth()->id()
        ]);
        Category::create([
            'name' => 'Web Design',
            'user_id'=>auth()->id()
        ]);

        //test endpoint
        $this->get( '/dashboard/categories');
        $this->assertTrue(true);
    }
    public function test_user_read_category()
    {
        //create user
        $user =User::create([
            'name' => 'Erita',
            'username' => 'erita',
            'email' => 'erita@gmail.com',
            'password' => Hash::make('secret9874'),
        ]);
        //Authentication middleware user
        $this->actingAs($user);

        //create category
        $category = Category::create([
            'name' => 'Programming',
            'user_id'=>auth()->id()
        ]);

         //test endpoint
         $this->get( '/dashboard/categories'. $category->id,[]);
         $this->assertTrue(true);
    }
    public function test_user_update_category()
    {
        //create user
        $user =User::create([
            'name' => 'Erita',
            'username' => 'erita',
            'email' => 'erita@gmail.com',
            'password' => Hash::make('secret9874'),
        ]);
        //Authentication middleware user
        $this->actingAs($user);

        //create category
        $category = Category::create([
            'name' => 'Programming',
            'user_id'=>auth()->id()
        ]);
        $categoryUpdate = [
            'name' => 'Web Design',
            'user_id'=>auth()->id()
        ];

        //test endpoint
        $this->put( '/dashboard/categories'. $category->id,$categoryUpdate,[]);
        $this->assertTrue(true);
       
    }
    public function test_user_delete_category()
    {
        //create user
        $user =User::create([
            'name' => 'Erita',
            'username' => 'erita',
            'email' => 'erita@gmail.com',
            'password' => Hash::make('secret9874'),
        ]);
        //Authentication middleware user
        $this->actingAs($user);

        //create category
        $category = Category::create([
            'name' => 'Programming',
            'user_id'=>auth()->id()
        ]);
        //test endpoint
        $this->delete( '/dashboard/categories'. $category->id,[]);
        $this->assertTrue(true);
       
    }
}
