{{--menggunakan tampilan web di main.blade.php pada folder layouts --}}
@extends('layouts.main')

{{-- menampilkan isi konten di Home --}}
@section('container')
    <h1>Halaman About</h1>
    <h2>{{ $name }}</h2>
    <h2>{{ $email }}</h2>
@endsection