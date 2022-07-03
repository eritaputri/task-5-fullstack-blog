<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
// menghubungkan model post
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    //method default yang terhubung ke routes file web.php
    public function index()
    {
        //membuat judul pada halaman author dan category ketika setelah di klik
        $title= '';
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = 'in' . $category->name;        
        }
        if(request('author')){
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;        
        }

        return view('posts', [
            //varibel title dengan judul Posts
            "title" => "All Posts" . $title,
            "active" => "posts",

            //variabel posts dengan menampilkan semua data di model post dengan mengambil data author dan acetgory untuk query
            "posts" => Post::latest()->filter(request(['search','category','author']))->paginate(7)->withQueryString()
        ]);
        
    }

    //menampilkan detail post dengan parameter model Post diikat denga variabel $post
    public function show(Post $post)
    {
        return view('post',[
            //varibel title dengan judul Posts
            "title" => "Single Posts",
            "active" => "posts",
            "post" => $post
        ]);
    }
}