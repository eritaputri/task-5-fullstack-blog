@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h1 class="mb-3">{{ $post->title }}</h1>
            <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back to all my posts</a>
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
        </div>
    </div>
</div>
@endsection