
{{-- HALAMAN SINGLE POST UNTUK MENAMPILKAN MORE --}}

{{--menggunakan tampilan web di main.blade.php pada folder layouts --}}
@extends('layouts.main')

{{-- menampilkan isi konten di Home --}}
@section('container')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mb-3">{{ $post->title }}</h1>
                {{-- menampilkan author dengan kategory yang telah di query dengan category_id dari model post  --}}
                <p>By 
                    <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">
                        {{ $post->author->name }}</a>
                    <a href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
                </p>

                @if ($post->image)
                    <div style="max-height: : 350px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
                    </div>
                @else    
                    <img src="https://source.unsplash.com/1200x400? {{ $post->category->name }}" class="img-fluid" alt=" {{ $post->category->name }}">
                @endif
                
                <article class="my-3 fs-7">
                    {{-- tanda seru !! untuk menghilangkan script html jika terdiri dari beberapa paragraf --}}
                    {!! $post->content !!}
                </article>

                <a href="/posts" class="d-block mt-3">Back to post</a>
            </div>
        </div>
    </div>
@endsection