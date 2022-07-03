
{{--menggunakan tampilan web di main.blade.php pada folder layouts --}}
@extends('layouts.main')

{{-- menampilkan isi konten di Home --}}
@section('container')
    <h1 class="mb-3 text-center">{{ $title }}</h1>

    {{-- searching --}}
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/posts">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search.." 
                        name="search" value="{{ request('search') }}">
                    <button class="btn btn-danger" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
    
    {{-- >{{ $post[0]->title }} = mengambil post index 0 menampilkan title --}}
    {{-- kondisi ketika ada postinga --}}
    @if ($posts->count())
        <div class="card mb-3">
            @if ($posts[0]->image)
            <div style="max-height: : 350px; overflow:hidden;">
                <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->category->name }}" class="img-fluid">
            </div>
            @else
            <img src="https://source.unsplash.com/1200x400? {{ $posts[0]->category->name }}" class="card-img-top" alt="...">
            @endif
            <div class="card-body text-center">
                <h5 class="card-title">
                    <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">
                        {{ $posts[0]->title }}
                    </a>
                </h5>
                <small class="text-muted">
                    <p>By <a href="/posts?author={{ $posts[0]->author->username}}" 
                            class="text-decoration-none">{{ $posts[0]->author->name }}</a> 
                        <a href="/posts?category={{ $posts[0]->category->id }}" 
                            class="text-decoration-none">{{ $posts[0]->category->name }}</a>
                        {{ $posts[0]->created_at->diffForHumans() }}
                    </p> 
                </small>
                <a href="/posts/{{ $posts[0]->id }}" class="text-decoration-none btn btn-primary">Read more</a>
            </div>
        </div>  
    


    @else
        <p class="text-center fs-4">No post found.</p>
    @endif

    {{-- halaman link berikutnya dengan fungsi paginate di controller --}}
    <div class="d-flex justify-content-end">
        {{ $posts->links() }}
    </div>
@endsection