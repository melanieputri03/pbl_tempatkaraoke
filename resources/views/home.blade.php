@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Selamat datang di Mikkeu Pangpang</h2>
        <p>Halo, <strong>{{ $nama }}</strong></p>
        <p>Anda adalah seorang <strong>{{ $pekerjaan }}</strong></p>
    </div>
@endsection
