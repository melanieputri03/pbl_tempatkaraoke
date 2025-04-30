<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Mikkeu Pangpang Karaoke')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-slate-900 text-white">

  <!-- Navbar -->
  <nav class="bg-[#e0f2fe] text-black p-4">
    <div class="max-w-7xl mx-auto flex items-center justify-between relative">
      <div class="absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 flex items-center space-x-8">
        <div class="flex space-x-6">
          <a href="#" class="font-semibold hover:underline">Beranda</a>
          <a href="#" class="font-semibold hover:underline">Ruangan</a>
        </div>
        <div>
          <img src="{{ asset('logo.jpeg') }}" alt="Logo" class="w-12 h-12 object-cover rounded-full">
        </div>
        <div class="flex space-x-6">
          <a href="#" class="font-semibold hover:underline">Ulasan</a>
          <a href="#" class="font-semibold hover:underline">Kontak</a>
        </div>
      </div>
      <div class="ml-auto">
        <button class="bg-slate-800 text-white px-4 py-2 rounded hover:bg-slate-700">Masuk</button>
      </div>
    </div>
  </nav>

  <!-- Content -->
  <div class="container mx-auto px-4 py-6">
    @yield('content')
  </div>

  <!-- Footer -->
  <footer class="bg-[#0E1D2B] p-8 grid md:grid-cols-4 gap-6 text-gray-400 text-sm">
    <div>
      <h4 class="text-lg font-bold text-white mb-2">Mikkeu Pangpang</h4>
      <div class="flex items-center mb-6 md:mb-0">
        <img src="{{ asset('logo.jpeg') }}" alt="Logo Footer" class="w-10 h-10 rounded-full mr-2">
        <p>Rasakan pengalaman karaoke terbaik hanya di Mikkeu Pangpang! Reservasi, Booking sekarang.</p>
      </div>
    </div>
    <div>
      <h4 class="text-lg font-bold text-white mb-2">Kontak</h4>
      <div class="flex items-center mb-2">
        <i class="fas fa-phone-alt mr-2"></i>
        <p>Telepon : 0813401066</p>
      </div>
      <div class="flex items-center">
        <i class="fab fa-instagram mr-2"></i>
        <p>Instagram : mikkeu_pangpang</p>
      </div>
    </div>
    <div>
      <h4 class="text-lg font-bold text-white mb-2">Alamat</h4>
      <div class="flex items-center mb-2">
        <i class="fas fa-map-marker-alt mr-2"></i>
        <p>Jl. Senayang No.13, Kec. Kby. Baru, Kota Batam</p>
      </div>
    </div>
    <div>
      <h4 class="text-lg font-bold text-white mb-2">Sosial Media</h4>
      <div class="flex items-center mb-2">
        <i class="fab fa-facebook mr-2"></i>
        <p>Mikkeu Pangpang Location</p>
      </div>
      <div class="flex items-center">
        <i class="fab fa-whatsapp mr-2"></i>
        <p>WhatsApp Contact</p>
      </div>
    </div>
  </footer>

</body>
</html>
