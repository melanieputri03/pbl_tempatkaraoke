<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bantuan - Joyful & Cream</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="bantuan.css" rel="stylesheet">
</head>
<body style="background-color: #FFF8F8">

 <!-- Navbar -->
 <nav class="navbar">
        <div class="store-name">Joyful & Cream</div>
        <div class="nav-actions">
            <div class="nav-Menu">
                <a href="halaman_utama.php">Beranda</a>
                <a href="menu.php">Beli</a>
                <a href="bantuan.php">Bantuan</a>
                <a href="tentangkami.php">Tentang Kami</a>
            </div>
            <div class="icon-container d-flex align-items-center">
                <form action="halaman_utama.php" method="get" class="d-flex">
                    <input type="text" name="search" class="form-control" placeholder="Cari kue..." />
                    <button type="submit" class="btn btn-outline-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
                <a href="keranjang.php">
                    <i class="fas fa-shopping-cart"></i>
                </a>
                <div class="dropdown">
                    <a href="#" class="btn btn-light dropdown-toggle" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li><a class="dropdown-item" href="profil.php">Profil</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="riwayat_pemesanan.php">Riwayat Pemesanan</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="POST" action="logout.php" class="d-inline">
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

<!-- Header -->
<header>
    <h1>Bantuan</h1>
    <p>Temukan jawaban atas pertanyaan umum atau ajukan pertanyaan baru</p>
</header>

<!-- Halaman FAQ -->
<div class="faq">
    <p>Akun</p>
    <div class="faq-item">
        <div class="faq-question">Bagaimana cara mendaftar akun?</div>
        <div class="faq-answer">Klik ikon Profile yang terdapat di halaman utama lalu pilih menu Login dan klik tautan bertuliskan Belum punya akun? yang tersedia pada halaman login.</div>
    </div>
    <div class="faq-item">
        <div class="faq-question">Apa yang harus saya lakukan jika lupa kata sandi saat ingin login?</div>
        <div class="faq-answer">Klik "Lupa Kata Sandi" di halaman login, masukkan alamat email yang terdaftar, dan masukkan kata sandi baru untuk melakukan reset kata sandi.</div>
    </div>
    <p>Pembayaran</p>
    <div class="faq-item">
        <div class="faq-question">Apa saja metode pembayaran yang tersedia?</div>
        <div class="faq-answer">Kami hanya menerima pembayaran secara tunai ditoko.</div>
    </div>
    <p>Layanan Toko</p>
    <div class="faq-item">
        <div class="faq-question">Kapan jam operasional toko?</div>
        <div class="faq-answer">Joyful & Cream siap melayani anda setiap hari, mulai dari pukul 09.00 WIB hingga 18.00 WIB.</div>
    </div>
    <div class="faq-item">
        <div class="faq-question">Berapa lama proses pembuatan kue?</div>
        <div class="faq-answer">Proses pembuatan kue memakan waktu 2 hari, pastikan anda memilih tanggal pengambilan minimal 2 hari setelah pesanan dibuat.</div>
    </div>
    <div class="faq-item">
        <div class="faq-question">Apakah toko menyediakan layanan pengiriman?</div>
        <div class="faq-answer">Tidak, anda bisa mengambil kue secara langsung ditoko.</div>
    </div>
</div>
<br>

<!-- Formulir Pertanyaan -->
<div class="container">
    <div class="question-form">
        <h3>Ajukan Pertanyaan Anda</h3>
        <form action="proses_bantuan.php" method="POST">
            <label for="name">Nama:</label>
            <input type="text" id="nama" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="question">Pertanyaan:</label>
            <textarea id="pertanyaan" name="question" rows="4" required></textarea>

            <button type="submit">Kirim Pertanyaan</button>
        </form>
    </div>
</div>

<!-- Footer -->
<footer style="background-color: #ffc8dd; padding: 20px; font-family: 'Georgia', serif;">
    <div style="display: flex; justify-content: space-between; align-items: flex-start;">
        <!-- Bagian Kiri -->
        <div>
            <h2 style="margin: 0; font-weight: 700;">Joyful<br>& Cream</h2>
        </div>

        <!-- Bagian Tengah -->
        <div>
            <ul style="list-style-type: none; padding: 0; margin: 0;">
                <li style="margin-bottom: 10px;"><a href="bantuan.php" style="text-decoration: none; color: black;">Bantuan</a></li>
                <li><a href="tentangkami.php" style="text-decoration: none; color: black;">Tentang Kami</a></li>
            </ul>
        </div>

        <!-- Bagian Kanan -->
        <div style="text-align: right;">
            <p style="margin: 0; margin-bottom: 10px;">Ikuti Media Sosial Kami</p>
            <div style="margin-bottom: 20px;">
                <a href="https://www.instagram.com/zahh._na/" target="_blank" style="margin-right: 10px;">
                    <i class="fab fa-instagram" style="font-size: 24px; color: black;"></i>
                </a>
                <a href="https://twitter.com/username/" target="_blank" style="margin-right: 10px;">
                    <i class="fab fa-twitter" style="font-size: 24px; color: black;"></i>
                </a>
                <a href="https://www.tiktok.com/@zahunyu" target="_blank">
                    <i class="fab fa-tiktok" style="font-size: 24px; color: black;"></i>
                </a>
            </div>
            <ul style="list-style-type: none; padding: 0; margin: 0;">
                <li style="margin-bottom: 10px;">
                    <a href="https://wa.me/6282385289497" style="text-decoration: none; color: black;" target="_blank">WhatsApp</a>
                </li>
                <li style="margin-bottom: 10px;">
                    <a href="mailto:afdg.ackr25@gmail.com" style="text-decoration: none; color: black;">Email</a>
                </li>
                <li>
                    <a href="https://goo.gl/maps/xyz123" style="text-decoration: none; color: black;" target="_blank">Alamat</a>
                </li>
            </ul>
        </div>
    </div>
</footer>

<script>
    // Script untuk toggle FAQ answer
    document.querySelectorAll('.faq-question').forEach(item => {
        item.addEventListener('click', () => {
            const answer = item.nextElementSibling;
            answer.style.display = answer.style.display === 'block' ? 'none' : 'block';
        });
    });
</script>

</body>
</html>