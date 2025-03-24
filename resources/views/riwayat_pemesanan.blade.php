<?php
// Nama File: riwayat_pemesanan.php
// Deskripsi: File ini digunakan untuk menampilkan riwayat pesanan dan memberikan tombol untuk pembeli mendownload resi.
// Dibuat oleh: Muhammad Rizky Febrian - NIM: 3312401082
//              Muhammad Aulia - NIM: 3312401074
// Tanggal: 29 Desember 2024

session_start(); // Mulai sesi di awal file

// Periksa apakah role adalah pembeli
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'pembeli') {
    header('Location: loginn.php');
    exit();
}

// Koneksi ke database
include('koneksi.php');

// Ambil nilai pencarian jika ada
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Ambil username dari sesi
$username = isset($_SESSION['username']) ? mysqli_real_escape_string($koneksi, $_SESSION['username']) : '';

// Periksa apakah username tersedia di sesi
if (empty($username)) {
    echo "Gagal memuat data. Silakan login kembali.";
    exit();
}

// Query dasar untuk mengambil data riwayat pemesanan berdasarkan username
$query = "SELECT * FROM pesanan WHERE username = '$username'";

// Menambahkan kondisi pencarian jika ada
if (!empty($search)) {
    $query .= " AND nama_kue LIKE '%" . mysqli_real_escape_string($koneksi, $search) . "%'";
}

// Jalankan query
$result = mysqli_query($koneksi, $query);

// Hitung jumlah hasil
$num_rows = mysqli_num_rows($result);

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
            padding-top: 70px;
            /* Sesuaikan tinggi navbar */
            background-color: #FFF8F8;
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
            /* Sesuaikan tinggi navbar */
        }
    </style>
</head>

<body>

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

    <!-- Riwayat Pemesanan -->
    <div class="container">
        <h3 class="mt-4 mb-4">Riwayat Pemesanan</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kue</th>
                    <th>Quantity</th>
                    <th>Total Harga</th>
                    <th>Tanggal Pengambilan</th>
                    <th>Status Pembayaran</th> <!-- Kolom baru -->
                    <th>Resi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!isset($_SESSION['username'])) {
                    echo "<tr><td colspan='7' class='text-center'>Silakan login terlebih dahulu.</td></tr>";
                } else {
                    $username = $koneksi->real_escape_string($_SESSION['username']);
                    $query = "SELECT * FROM pesanan WHERE username = '$username'";
                    $result = $koneksi->query($query);

                    if ($result->num_rows > 0) {
                        $no = 1;
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                    <td>{$no}</td>
                    <td>{$row['nama_kue']}</td>
                    <td>{$row['quantity']}</td>
                    <td>Rp " . number_format($row['total_harga'], 0, ',', '.') . "</td>
                    <td>{$row['tanggal']} {$row['waktu']}</td>
                    <td>{$row['status_konfirmasi']}</td>
                    <td>";
                            if ($row['status_konfirmasi'] === 'Dikonfirmasi') {
                                echo "<a href='cetak_resi.php?id_pesanan={$row['id']}' class='btn btn-primary btn-sm'>Cetak Resi</a>";
                            } else {
                                echo "<button class='btn btn-secondary btn-sm' disabled>Belum Dikonfirmasi</button>";
                            }
                            echo "</td>
                </tr>";
                            $no++;
                        }
                    } else {
                        echo "<tr><td colspan='7' class='text-center'>Tidak ada riwayat pemesanan.</td></tr>";
                    }
                }
                ?>
            </tbody>

        </table>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>