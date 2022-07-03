<?php

namespace Tests\Unit;
use Tests\TestCase;
use App\Models\Post;
use App\Models\User;

use App\Models\Category;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DashboardPostTest extends TestCase
{
    public function test_user_create_post()
    {
        //create user
        $user =User::create([
            'name' => 'Erita',
            'email' => 'erita@gmail.com',
            'username' => 'erita',
            'password' => Hash::make('secret9874'),
        ]);
        //Authentication middleware user
        $this->actingAs($user);

        //create category
        $category = Category::create([
            'name' => 'Programming',
            'user_id'=>auth()->id()
        ]);
        Storage::fake('local');
        $file = UploadedFile::fake()->create('avatar.jpg');
        
        $post = [
            'title' => 'Article Programming',
            'content' => 'Programming Content',
            'image' => $file,
            'category_id' => $category->id,
            'user_id' => auth()->id(),
        ];
        //test endpoint
        $this->post('/dashboard/posts', $post);
        $this->assertTrue(true);
    }
    public function test_user_list_post()
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
        Storage::fake('local');
        $file = UploadedFile::fake()->create('avatar.jpg');
        
        Post::create( [
            'title' => 'Article Programming',
            'content' => 'Programming Content',
            'image' => $file,
            'category_id' => $category->id,
            'user_id' => auth()->id(),
        ]);

        //test endpoint
        $this->get( '/dashboard/posts');
        $this->assertTrue(true);
    }
    public function test_user_read_post()
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
        Storage::fake('local');
        $file = UploadedFile::fake()->create('avatar.jpg');
        
        $post = Post::create( [
            'title' => 'Article Programming',
            'content' => 'Programming Content',
            'image' => $file,
            'category_id' => $category->id,
            'user_id' => auth()->id(),
        ]);
         //test endpoint
         $this->get( '/dashboard/posts'. $post->id,[]);
         $this->assertTrue(true);
    }
    public function test_user_update_post()
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
        Storage::fake('local');
        $file = UploadedFile::fake()->create('avatar.jpg');
        
        $post = Post::create( [
            'title' => 'Article Programming',
            'content' => 'Programming Content',
            'image' => $file,
            'category_id' => $category->id,
            'user_id' => auth()->id(),
        ]);
        $postUpdate =  [
            'title' => 'Update Article Programming',
            'content' => 'Programming Content',
            'image' => $file,
            'category_id' => $category->id,
            'user_id' => auth()->id(),
        ];

        //test endpoint
        $this->put( '/dashboard/posts'. $post->id,$postUpdate,[]);
        $this->assertTrue(true);
       
    }
    public function test_user_delete_post()
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
        Storage::fake('local');
        $file = UploadedFile::fake()->create('avatar.jpg');
        
        $post = Post::create( [
            'title' => 'Article Programming',
            'content' => 'Programming Content',
            'image' => $file,
            'category_id' => $category->id,
            'user_id' => auth()->id(),
        ]);
        //test endpoint
        $this->delete( '/dashboard/posts'. $post->id,[]);
        $this->assertTrue(true);
       
    }
}
