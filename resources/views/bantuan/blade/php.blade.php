<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bantuan - Joyful & Cream</title>
    <script src="https://cdn.tailwindcss.com/3.4.1"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="bg-pink-50 font-sans">

<!-- Navbar -->
<nav class="bg-white shadow-md py-4 px-8 flex justify-between items-center">
    <div class="text-2xl font-bold text-pink-700">Joyful & Cream</div>
    <div class="flex gap-6 items-center">
        <div class="space-x-4">
            <a href="halaman_utama.php" class="text-gray-700 hover:text-pink-500">Beranda</a>
            <a href="menu.php" class="text-gray-700 hover:text-pink-500">Beli</a>
            <a href="bantuan.php" class="text-gray-700 hover:text-pink-500">Bantuan</a>
            <a href="tentangkami.php" class="text-gray-700 hover:text-pink-500">Tentang Kami</a>
        </div>
        <form action="halaman_utama.php" method="get" class="flex items-center gap-2">
            <input type="text" name="search" class="border rounded px-2 py-1" placeholder="Cari kue..." />
            <button type="submit" class="text-pink-600 hover:text-pink-800">
                <i class="fas fa-search"></i>
            </button>
        </form>
        <a href="keranjang.php" class="text-pink-600 text-xl">
            <i class="fas fa-shopping-cart"></i>
        </a>
        <div class="relative">
            <button class="text-xl text-gray-600" id="dropdownButton">
                <i class="fas fa-user-circle"></i>
            </button>
            <ul class="hidden absolute right-0 mt-2 bg-white shadow-lg border rounded-md w-48 z-10" id="dropdownMenu">
                <li><a href="profil.php" class="block px-4 py-2 hover:bg-gray-100">Profil</a></li>
                <li><a href="riwayat_pemesanan.php" class="block px-4 py-2 hover:bg-gray-100">Riwayat Pemesanan</a></li>
                <li>
                    <form method="POST" action="logout.php">
                        <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Header -->
<header class="text-center mt-10">
    <h1 class="text-3xl font-bold text-pink-700">Bantuan</h1>
    <p class="text-gray-600 mt-2">Temukan jawaban atas pertanyaan umum atau ajukan pertanyaan baru</p>
</header>

<!-- FAQ -->
<div class="max-w-4xl mx-auto mt-10 space-y-6">
    <p class="text-xl font-semibold text-pink-600">Akun</p>
    <div class="bg-white shadow p-4 rounded">
        <div class="font-medium text-gray-800 cursor-pointer faq-question">Bagaimana cara mendaftar akun?</div>
        <div class="text-gray-600 mt-2 hidden faq-answer">Klik ikon Profile di halaman utama lalu pilih Login dan klik tautan "Belum punya akun?"</div>
    </div>
    <div class="bg-white shadow p-4 rounded">
        <div class="font-medium text-gray-800 cursor-pointer faq-question">Apa yang harus saya lakukan jika lupa kata sandi saat ingin login?</div>
        <div class="text-gray-600 mt-2 hidden faq-answer">Klik "Lupa Kata Sandi" di halaman login dan ikuti petunjuknya.</div>
    </div>

    <p class="text-xl font-semibold text-pink-600">Pembayaran</p>
    <div class="bg-white shadow p-4 rounded">
        <div class="font-medium text-gray-800 cursor-pointer faq-question">Apa saja metode pembayaran yang tersedia?</div>
        <div class="text-gray-600 mt-2 hidden faq-answer">Kami hanya menerima pembayaran secara tunai di toko.</div>
    </div>

    <p class="text-xl font-semibold text-pink-600">Layanan Toko</p>
    <div class="bg-white shadow p-4 rounded">
        <div class="font-medium text-gray-800 cursor-pointer faq-question">Kapan jam operasional toko?</div>
        <div class="text-gray-600 mt-2 hidden faq-answer">Setiap hari dari pukul 09.00 WIB hingga 18.00 WIB.</div>
    </div>
    <div class="bg-white shadow p-4 rounded">
        <div class="font-medium text-gray-800 cursor-pointer faq-question">Berapa lama proses pembuatan kue?</div>
        <div class="text-gray-600 mt-2 hidden faq-answer">Prosesnya memakan waktu 2 hari.</div>
    </div>
    <div class="bg-white shadow p-4 rounded">
        <div class="font-medium text-gray-800 cursor-pointer faq-question">Apakah toko menyediakan layanan pengiriman?</div>
        <div class="text-gray-600 mt-2 hidden faq-answer">Tidak, Anda bisa mengambilnya langsung di toko.</div>
    </div>
</div>

<!-- Formulir -->
<div class="max-w-2xl mx-auto mt-10 p-6 bg-white shadow rounded">
    <h3 class="text-xl font-semibold text-gray-700 mb-4">Ajukan Pertanyaan Anda</h3>
    <form action="proses_bantuan.php" method="POST" class="space-y-4">
        <div>
            <label for="name" class="block text-gray-700">Nama:</label>
            <input type="text" id="nama" name="name" required class="w-full border rounded px-3 py-2">
        </div>
        <div>
            <label for="email" class="block text-gray-700">Email:</label>
            <input type="email" id="email" name="email" required class="w-full border rounded px-3 py-2">
        </div>
        <div>
            <label for="question" class="block text-gray-700">Pertanyaan:</label>
            <textarea id="pertanyaan" name="question" rows="4" required class="w-full border rounded px-3 py-2"></textarea>
        </div>
        <button type="submit" class="bg-pink-600 text-white px-4 py-2 rounded hover:bg-pink-700">Kirim Pertanyaan</button>
    </form>
</div>

<!-- Footer -->
<footer class="bg-pink-200 mt-16 p-6 text-gray-800">
    <div class="max-w-6xl mx-auto flex justify-between flex-wrap">
        <div>
            <h2 class="text-2xl font-bold">Joyful<br>& Cream</h2>
        </div>
        <div>
            <ul>
                <li class="mb-2"><a href="bantuan.php" class="hover:underline">Bantuan</a></li>
                <li><a href="tentangkami.php" class="hover:underline">Tentang Kami</a></li>
            </ul>
        </div>
        <div>
            <p class="mb-2">Ikuti Media Sosial Kami</p>
            <div class="mb-4 space-x-3">
                <a href="https://www.instagram.com/zahh._na/" target="_blank"><i class="fab fa-instagram text-xl"></i></a>
                <a href="https://twitter.com/username/" target="_blank"><i class="fab fa-twitter text-xl"></i></a>
                <a href="https://www.tiktok.com/@zahunyu" target="_blank"><i class="fab fa-tiktok text-xl"></i></a>
            </div>
            <ul>
                <li><a href="https://wa.me/6282385289497" target="_blank" class="hover:underline">WhatsApp</a></li>
                <li><a href="mailto:afdg.ackr25@gmail.com" class="hover:underline">Email</a></li>
                <li><a href="https://goo.gl/maps/xyz123" target="_blank" class="hover:underline">Alamat</a></li>
            </ul>
        </div>
    </div>
</footer>

<script>
    // Toggle FAQ
    document.querySelectorAll('.faq-question').forEach(item => {
        item.addEventListener('click', () => {
            const answer = item.nextElementSibling;
            answer.classList.toggle('hidden');
        });
    });

    // Toggle dropdown
    document.getElementById('dropdownButton').addEventListener('click', () => {
        const menu = document.getElementById('dropdownMenu');
        menu.classList.toggle('hidden');
    });
</script>

</body>
</html>
