@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<section class="text-center p-8">
    <h1 class="text-3xl md:text-4xl font-bold mb-2">Karaoke Bagus di Batam</h1>
    <p class="text-gray-300 mb-8">Mikkeu Pangpang Karaoke dilengkapi dengan berbagai fasilitas premium untuk kenyamanan Anda</p>

    <!-- Carousel (dummy) -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <img src="https://i.pinimg.com/736x/aa/ef/ef/aaefef311f7303329d2260f4cfb2f8c2.jpg" class="rounded-lg" alt="">
        <img src="https://i.pinimg.com/736x/90/78/60/9078606cc3b5c1212addab7c68540ba6.jpg" class="rounded-lg" alt="">
        <img src="https://i.pinimg.com/736x/88/09/8f/88098f42149340a050702f6fa5d9d97a.jpg" class="rounded-lg" alt="">
    </div>

    <!-- Feature -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="bg-gray-700 p-4 rounded-lg">
            <i class="fas fa-check-circle text-yellow-400 text-3xl"></i>
            <h2 class="font-bold mt-2">Fasilitas Terbaik</h2>
            <p>Teknologi audio visual dan sofa nyaman.</p>
        </div>
        <div class="bg-gray-800 p-4 rounded-lg">
            <i class="fas fa-list text-yellow-400 text-3xl"></i>
            <h2 class="font-bold mt-2">Paket Beragam</h2>
            <p>Berbagai pilihan ruangan sesuai kebutuhan.</p>
        </div>
        <div class="bg-gray-700 p-4 rounded-lg">
            <i class="fas fa-smile text-yellow-400 text-3xl"></i>
            <h2 class="font-bold mt-2">Pelayanan Ramah</h2>
            <p>Staff siap melayani Anda dengan senyum.</p>
        </div>
        <div class="bg-gray-800 p-4 rounded-lg">
            <i class="fas fa-glass-cheers text-yellow-400 text-3xl"></i>
            <h2 class="font-bold mt-2">Menu Variatif</h2>
            <p>Pilihan makanan & minuman lengkap.</p>
        </div>
    </div>
</section>
@endsection
