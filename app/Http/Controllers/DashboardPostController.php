<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //menampilkan data post berdasarkan user
    public function index()
    {
        return view('dashboard.posts.index', [
            "posts"=> Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //manmpilakan halaman tambah post
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //menjalankan fungsi tambah
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'title'=> 'required',
            'category_id'=> 'required',
            'image'=> 'required|image|max:2048',
            'content'=> 'required'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        //insert data
        $validatedData['user_id'] = auth()->user()->id;

        Post::create($validatedData);
        return redirect('/dashboard/posts')->with('success', 'Pesan ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    //lihat detail post
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post'=> $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    //halaman ubah data
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

     //halaman proses ubah data
    public function update(Request $request, Post $post)
    {
        $rules =[
            'title'=> 'required|max:255',
            'category_id'=> 'required',
            'image'=> 'image|file|max:1024',
            'content'=> 'required'
        ];

        $validatedData = $request->validate($rules);

        
        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Post::where('id', $post->id)
            ->update($validatedData);
        return redirect('/dashboard/posts')->with('success', 'Post Has Been Updated
        !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

     //delete post
    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'Post Has Been Deleted!');
    }
  

}
