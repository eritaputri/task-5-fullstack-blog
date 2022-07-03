{{-- HALAMAN LIST CATEGORI --}}


{{--menggunakan tampilan web di main.blade.php pada folder layouts --}}
@extends('layouts.main')

{{-- menampilkan isi konten di Home --}}
@section('container')
    <h1>Category Posts</h1>

    <div class="container">
        <div class="row">
            @foreach($categories as $category)
                <div class="col-md-4">
                    <a href="/posts?category={{ $category->id }}">
                        <div class="card bg-dark text-white">
                            <img src="https://source.unsplash.com/500x400? {{ $category->name }}" class="card-img-top" alt=" {{ $category->name }}">
                            <div class="card-img-overlay d-flex align-items-center p-0">
                                <h5 class="card-title text-center flex-fill p-4" style="background-color: rgba(0,0,0,0.7)">{{ $category->name }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection