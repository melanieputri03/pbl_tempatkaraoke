@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Selamat datang di Mikkeu Pangpang</h1>

        <img src="{{ asset('images/foto2.jpg') }}" alt="Foto 1">
        <img src="{{ asset('images/foto1.jpg') }}" alt="Foto 2">

        <p>Halo, <strong>{{ $nama }}</strong></p>
        <p>Anda adalah seorang <strong>{{ $pekerjaan }}</strong></p>
    </div>
@endsection
