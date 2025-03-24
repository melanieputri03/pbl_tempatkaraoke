<?php
// Nama File: keranjang.php
// Deskripsi: Halaman ini digunakan untuk menampilkan isi keranjang belanja pengguna. 
//            Pengguna dapat menambah, mengubah jumlah, atau menghapus produk dari keranjang. 
//            Halaman ini juga menampilkan total harga belanja dan memberikan opsi untuk melakukan checkout.
// Dibuat oleh: Muhammad Rizky Febrian - NIM: 3312401082
//              Muhammad Aulia - NIM: 3312401074
// Tanggal: 15 Desember 2024

session_start(); // Mulai session

// Fungsi untuk redirect ke halaman yang sama
function redirect($url)
{
    header("Location: $url");
    exit();
}

// Cek jika ada data produk yang dikirim melalui POST (produk yang akan ditambahkan ke keranjang)
if (isset($_POST['kode'])) {
    // Ambil data produk dari form
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $harga = isset($_POST['harga']) ? $_POST['harga'] : 0;
    $gambar = isset($_POST['gambar']) ? $_POST['gambar'] : '';
    $ukuran = isset($_POST['ukuran']) ? $_POST['ukuran'] : '';
    $catatan = isset($_POST['catatan']) ? $_POST['catatan'] : '';

    // Jika session keranjang belum ada, buat array baru
    if (!isset($_SESSION['keranjang'])) {
        $_SESSION['keranjang'] = [];
        // Cek kombinasi kode dan ukuran di keranjang
        $keranjang_key = $kode . '-' . $ukuran; // Kombinasi kode dan ukuran
    }

    $keranjang_key = $nama . '-' . $ukuran; // Kombinasi kode dan ukuran

    // Jika produk sudah ada di keranjang, tambahkan jumlahnya
    if (isset($_SESSION['keranjang'][$keranjang_key])) {
        $jumlah = isset($_POST['jumlah']) ? (int)$_POST['jumlah'] : 1;
        $_SESSION['keranjang'][$keranjang_key]['quantity'] += $jumlah;
    } else {
        // Jika produk belum ada di keranjang, tambahkan produk baru
        $jumlah = isset($_POST['jumlah']) ? (int)$_POST['jumlah'] : 1;
        $_SESSION['keranjang'][$keranjang_key] = [
            'nama' => $nama,
            'kode' => $kode,
            'harga' => $harga,
            'gambar' => $gambar,
            'ukuran' => $ukuran,
            'catatan' => $catatan,
            'quantity' => $jumlah
        ];
    }



    // Redirect untuk mencegah pengiriman ulang
    redirect('keranjang.php');
}

// Cek jika ada produk yang ingin dihapus dari keranjang
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['hapus_kode'])) {
    $hapus_kode = $_POST['hapus_kode'];
    unset($_SESSION['keranjang'][$hapus_kode]); // Menghapus produk dari keranjang

    // Redirect untuk mencegah pengiriman ulang
    redirect('keranjang.php');
}



// Cek jika keranjang kosong
$keranjang_kosong = empty($_SESSION['keranjang']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joyful & Cream</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .carousel-item img {
            height: 85vh;
            width: 100%;
            margin: 0;
            object-fit: cover;
        }

        .carousel {
            width: 100vw;
            margin: 0 auto;
            overflow: hidden;
        }

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

        .modal-body {
            display: flex;
            align-items: flex-start;
            gap: 30px;
            padding: 30px;
        }

        .modal-body img {
            max-width: 100%;
            border-radius: 10px;
        }

        .product-info h5 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .product-info p {
            margin-bottom: 10px;
        }

        .form-select,
        .form-control {
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #ffc8dd;
            border: none;
            color: #2B1818;
        }

        .product-info h5,
        .product-info {
            margin-bottom: 15px;
        }

        footer {
            background-color: #f5e3de;
            padding: 20px;
            font-family: 'Georgia', serif;
        }

        footer h2 {
            margin: 0;
            font-weight: 700;
        }

        footer ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        footer ul li {
            margin-bottom: 10px;
        }

        footer a {
            text-decoration: none;
            color: black;
        }

        footer .social-icons img {
            margin-right: 10px;
        }

        .container {
            padding-top: 80px;
            /* Sesuaikan dengan tinggi navbar */
        }
    </style>
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

    <!-- Keranjang Section -->
    <div class="container mt-4">
        <h2>Keranjang Saya</h2>
        <hr>
        <?php if ($keranjang_kosong): ?>
            <p>Keranjang Anda kosong.</p>
        <?php else: ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Ukuran</th>
                        <th>Catatan</th>
                        <th>Quantity</th>
                        <th>Harga</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total_bayar = 0;
                    foreach ($_SESSION['keranjang'] as $kode => $item):
                        $total_harga = $item['harga'] * $item['quantity'];
                        $total_bayar += $total_harga;
                    ?>
                        <tr>
                            <td><img src="uploads/<?php echo $item['gambar']; ?>" width="80" height="80" style="object-fit: cover;" /></td>
                            <td><?php echo $item['nama']; ?></td>
                            <td><?php echo $item['ukuran']; ?></td>
                            <td><?php echo $item['catatan']; ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td>Rp. <?php echo number_format($item['harga'], 0, ',', '.'); ?></td>
                            <td>Rp. <?php echo number_format($total_harga, 0, ',', '.'); ?></td>
                            <td>
                                <!-- Form untuk hapus produk -->
                                <form method="post" action="keranjang.php" style="display:inline;">
                                    <input type="hidden" name="hapus_kode" value="<?php echo $kode; ?>">
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="text-right">
                <h4>Total Belanja: Rp. <?php echo number_format($total_bayar, 0, ',', '.'); ?></h4>
                <button class="btn btn-success" onclick="window.location.href='pesanan.php'">Buat Pesanan</button>
            </div>

        <?php endif; ?>

    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>