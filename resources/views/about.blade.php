@extends('layouts.app')

@section('title', 'About Us')

@section('content')
    <div class="container">
        <h2>Tentang Kami</h2>
        <p>Halo, saya <strong>{{ $nama }}</strong></p>
        <p>{{ $deskripsi }}</p>
    </div>
@endsection
