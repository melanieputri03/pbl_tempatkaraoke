<?php
// Nama File: pesanan.php
// Deskripsi: Halaman untuk menampilkan detail pesanan dari keranjang, 
//            memproses pemesanan dengan memasukkan data ke dalam database, 
//            dan menyimpan informasi tanggal dan waktu pengambilan.
// Dibuat oleh: Muhammad Aulia - NIM: 3312401074
// Tanggal: 17 Desember 2024

session_start();
// Include file koneksi
include 'koneksi.php';

// Cek jika keranjang kosong
$keranjang_kosong = empty($_SESSION['keranjang']);
$total_bayar = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];
    $_SESSION['tanggal'] = $tanggal;  // Simpan tanggal ke session
    $_SESSION['waktu'] = $waktu;
    $_SESSION['nama_kue'] = $nama_kue;      // Simpan waktu ke session
    $username = $_SESSION['username']; // Ambil username dari session


    // Proses untuk menyimpan semua pesanan dalam keranjang
    foreach ($_SESSION['keranjang'] as $kode => $item) {
        $nama_kue = $item['nama'];
        $harga = $item['harga'];
        $catatan = $item['catatan'];
        $ukuran = $item['ukuran'];
        $quantity = $item['quantity'];
        $total_harga = $item['harga'] * $item['quantity'];

        // Query untuk menyimpan data pesanan
        $sql = "INSERT INTO pesanan (nama_kue, harga, catatan, ukuran, quantity, total_harga, tanggal, waktu, username) 
                VALUES ('$nama_kue', '$harga', '$catatan', '$ukuran', '$quantity', '$total_harga', '$tanggal', '$waktu', '$username')";

        $result = mysqli_query($koneksi, $sql);
        if (!$result) {
            die("Query gagal: " . mysqli_error($conn));
        }
    }

    // Kosongkan keranjang setelah menyimpan semua data
    unset($_SESSION['keranjang']);


    // Setelah semua item berhasil disimpan
    $_SESSION['pesan'] = "Pesanan Berhasil Dibuat";
    // Redirect ke halaman konfirmasi setelah semua item berhasil disimpan

    header("Location: halaman_utama.php");
    exit(); // Pastikan untuk keluar setelah redirect
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joyful & Cream</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="pesanan.css">
    <style>
        body {
            padding-top: 13px;
        }

        /* Navbar Styling */
        .navbar {
            background: linear-gradient(to right, #FDD5DF, #FDD5DF);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .navbar .store-name {
            font-family: 'Cooper Black', cursive;
            text-decoration: none;
            font-size: 22px;
            font-weight: bold;
            color: #2B1818;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .nav-Menu {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .nav-Menu a {
            font-family: 'Roboto', sans-serif;
            font-size: 16px;
            color: #2B1818;
            text-decoration: none;
            padding: 5px 10px;
            transition: color 0.3s ease, background-color 0.3s ease;
            border-radius: 5px;
        }

        .nav-Menu a:hover {
            background-color: #ffc8dd;
            color: #2B1818;
        }

        .icon-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .icon-container i {
            font-size: 20px;
            color: #2B1818;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .icon-container i:hover {
            color: #ffafcc;
        }

        .gambar-menu {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 10px 10px 0 0;
        }

        .pink-button {
            background-color: #ffc8dd;
            color: #2B1818;
            border: none;
            padding: auto;
            border-radius: 5px;
        }
    </style>
</head>

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

<div class="container">
    <br>
    <h3 class="mt-3 mb-4">Detail Pesanan</h3>
    <hr>
    <br>
    <div class="detail-wrapper">
        <?php if ($keranjang_kosong): ?>
            <p>Keranjang Anda kosong.</p>
        <?php else: ?>
            <!-- Kolom Kiri: Detail Pesanan -->
            <div class="col-6">
                <?php foreach ($_SESSION['keranjang'] as $kode => $item):
                    $total_harga = $item['harga'] * $item['quantity'];
                    $total_bayar += $total_harga;
                ?>
                    <div class="order-card">
                        <div class="order-img">
                            <img src="uploads/<?php echo $item['gambar']; ?>" alt="Produk" style="width: 100px; height: 100px; object-fit: cover;">
                        </div>
                        <div class="order-details">
                            <p><strong>Nama Kue:</strong> <?php echo $item['nama']; ?></p>
                            <p><strong>Harga:</strong> <span class="harga"><?php echo number_format($item['harga'], 0, ',', '.'); ?></span> Rp</p>
                            <p><strong>Ukuran:</strong> <?php echo $item['ukuran']; ?></p>
                            <p><strong>Catatan:</strong> <?php echo $item['catatan']; ?></p>
                            <p><strong>Jumlah:</strong> <?php echo $item['quantity']; ?></p>
                            <p><strong>Total:</strong> Rp <?php echo number_format($total_harga, 0, ',', '.'); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Kolom Kanan: Pilih Tanggal & Waktu Pengambilan -->
            <form method="POST" action="">
                <div class="col-6 tanggal-waktu ms-3">
                    <label for="tanggal-waktu">Pilih Tanggal & Waktu Pengambilan</label>
                    <input type="date" id="tanggal" name="tanggal" class="form-control" required>
                    <select id="waktu" name="waktu" class="form-select" required>
                        <option value="" disabled selected>Pilih Waktu</option>
                        <option value="08:00">08:00 - 09:00</option>
                        <option value="09:00">09:00 - 10:00</option>
                        <option value="10:00">10:00 - 11:00</option>
                        <option value="11:00">11:00 - 12:00</option>
                        <option value="12:00">12:00 - 13:00</option>
                        <option value="13:00">13:00 - 14:00</option>
                        <option value="14:00">14:00 - 15:00</option>
                    </select>
                </div>
            <?php endif; ?>
    </div>

    <!-- Total Pesanan & Button di Bawah -->
    <?php if (!$keranjang_kosong): ?>
        <div class="footer-wrapper">
            <div class="total-pesanan">Total Pesanan: Rp <span id="total-harga"><?php echo number_format($total_bayar, 0, ',', '.'); ?></span></div>
            <button type="submit" class="pink-button">Buat Pesanan</button>
        </div>
    <?php endif; ?>
</div>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>