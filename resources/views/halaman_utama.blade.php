<?php
// Nama File: halaman_utama.php
// Deskripsi: Kode ini adalah implementasi sebuah halaman utama untuk menampilkan produk kue dari database dan menyediakan fitur keranjang belanja.
// Dibuat oleh: Muhammad Rizky Febrian - NIM: 3312401082 , Anastasya Floresha Dominiq Ginting - NIM: 3312401068,
//              Zahrah Nazihah Ginting - NIM: 3312401077, Aprisius Togar Sihombing - NIM: 3312401085.
// Tanggal: 07 Desember 2024

session_start(); // Mulai sesi di awal file

// Periksa apakah role adalah pembeli
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'pembeli') {
    header('Location: loginn.php');
    exit();
}
// Tampilkan pesan notifikasi jika ada
if (isset($_SESSION['pesan'])) {
    echo "<script>alert('" . $_SESSION['pesan'] . "');</script>";
    unset($_SESSION['pesan']); // Hapus pesan setelah ditampilkan
}

// Koneksi ke database
include('koneksi.php');

// Ambil nilai pencarian jika ada
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Query dasar untuk mengambil data kue
$query = "SELECT * FROM kue";

// Menambahkan kondisi pencarian jika ada
if (!empty($search)) {
    $query .= " WHERE nama LIKE '%" . mysqli_real_escape_string($koneksi, $search) . "%'";
}

// Batasi hasil ke 8 data saja
$query .= " LIMIT 8";

// Jalankan query
$result = mysqli_query($koneksi, $query);
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
                <form action="menu.php" method="get" class="d-flex">
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

    <!-- Content-->
    <div class="container-fluid mt-5">
        <div class="row g-0">
            <!-- Carousel -->
    <div class="col-md-15">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
              <img src="https://i.pinimg.com/736x/92/c1/4a/92c14aaa9ce74b87090212147c1b919d.jpg" class="d-block w-100" alt="Slide 1">
              <div class="carousel-caption d-none d-md-block">
                <h5>November Event</h5>
                <p>Rich and moist chocolate cake, perfect for any celebration.</p>
              </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item">
              <img src="https://colettelola.com/cdn/shop/files/web_signature_2.jpg?v=1694175290&width=1750" class="d-block w-100" alt="Slide 2">
              <div class="carousel-caption d-none d-md-block">
                <h5>Green Garden</h5>
                <p>Take a minute to stop, smell the roses & stroll through Green Garden.</p>
              </div>
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item">
              <img src="https://colettelola.com/cdn/shop/files/Cashback-01.jpg?v=1696306531&width=1750" class="d-block w-100" alt="Slide 3">
              <div class="carousel-caption d-none d-md-block">
                <h5>Strawberry Cheesecake</h5>
                <p>Delicious strawberry cheesecake with a graham cracker crust.</p>
              </div>
            </div>
          </div>
      
          <!-- Carousel Controls -->
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>

            <!-- Produk Terbaru Section-->
            <h4 class="text-center fw-bold my-4">Rekomendasi Kue</h4>
            <div class="row">
                <?php
                // Menampilkan kue dari database
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <img src="uploads/<?php echo $row['gambar']; ?>" class="gambar-menu" alt="Product Image">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['nama']; ?></h5>
                                <p class="card-text">Rp. <?php echo $row['harga']; ?></p>
                                <i class="fas fa-star text-success"></i>
                                <i class="fas fa-star text-success"></i>
                                <i class="fas fa-star text-success"></i>
                                <i class="fas fa-star text-success"></i>
                                <i class="fas fa-star text-success"></i>
                                <br>
                                <button type="button" class="pink-button" data-bs-toggle="modal"
                                    data-bs-target="#detailModal<?php echo $row['kode']; ?>">Detail</button>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Detail Produk -->
                    <div class="modal fade" id="detailModal<?php echo $row['kode']; ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <!-- Header Modal -->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="detailModalLabel<?php echo $row['kode']; ?>">Detail Kue</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <!-- Body Modal -->
                                <div class="modal-body">
                                    <div class="row">
                                        <!-- Gambar Produk -->
                                        <div class="col-md-6 text-center">
                                            <img id="productImage<?php echo $row['kode']; ?>" src="uploads/<?php echo $row['gambar']; ?>" class="img-fluid rounded" alt="Gambar Produk">
                                        </div>
                                        <!-- Detail Produk -->
                                        <div class="col-md-6 product-info">
                                            <h5 id="productName<?php echo $row['kode']; ?>"><?php echo $row['nama']; ?></h5>
                                            <p id="productPrice<?php echo $row['kode']; ?>"><strong>Harga:</strong> Rp. <?php echo number_format($row['harga'], 0, ',', '.'); ?></p>
                                            <p id="productDetails<?php echo $row['kode']; ?>"><strong>Detail:</strong> <?php echo $row['detail']; ?></p>
                                            <form method="post" action="keranjang.php">
                                                <!-- Data Produk -->
                                                <input type="hidden" name="kode" value="<?php echo $row['kode']; ?>">
                                                <input type="hidden" name="nama" value="<?php echo $row['nama']; ?>">
                                                <input type="hidden" name="harga" value="<?php echo $row['harga']; ?>">
                                                <input type="hidden" name="gambar" value="<?php echo $row['gambar']; ?>">
                                                <!-- Pilih Ukuran -->
                                                <div class="mb-3">
                                                    <label for="productSize<?php echo $row['kode']; ?>" class="form-label"><strong>Pilih Ukuran:</strong></label>
                                                    <select id="productSize<?php echo $row['kode']; ?>" class="form-select" name="ukuran">
                                                        <option value="kecil">Kecil (15cm)</option>
                                                        <option value="sedang" selected>Sedang (20cm)</option>
                                                        <option value="besar">Besar (30cm)</option>
                                                    </select>
                                                </div>
                                                <!-- Catatan -->
                                                <div class="mb-4">
                                                    <label for="customMessage<?php echo $row['kode']; ?>" class="form-label"><strong>Catatan:</strong></label>
                                                    <input type="text" id="customMessage<?php echo $row['kode']; ?>" class="form-control" name="catatan" placeholder="Masukkan pesan singkat">
                                                </div>
                                                <!-- Jumlah -->
                                                <div class="quantity-controls d-flex align-items-center mb-3">
                                                    <input type="number" id="jumlah" name="jumlah" value="1" min="1" max="3" required>
                                                    <input type="hidden" name="kode" value="">
                                                </div>
                                                <!-- Tombol Submit -->
                                                <button type="submit" class="pink-button" onclick="return validateQuantity(<?php echo $row['kode']; ?>)">Masukkan ke Keranjang</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
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
                            <li style="margin-bottom: 10px;"><a href="#" style="text-decoration: none; color: black;">Bantuan</a></li>
                            <li><a href="#tentangkami.html" style="text-decoration: none; color: black;">Tentang Kami</a></li>
                        </ul>
                    </div>

                    <!-- Bagian Kanan -->
                    <div style="text-align: right;">
                        <p style="margin: 0; margin-bottom: 10px;">Ikuti Media Sosial Kami</p>
                        <div style="margin-bottom: 20px;">
                            <!-- Instagram -->
                            <a href="https://www.instagram.com/zahh._na/" target="_blank" style="margin-right: 10px;">
                                <i class="fab fa-instagram" style="font-size: 24px; color: black;"></i>
                            </a>
                            <!-- Twitter -->
                            <a href="https://twitter.com/username/" target="_blank" style="margin-right: 10px;">
                                <i class="fab fa-twitter" style="font-size: 24px; color: black;"></i>
                            </a>
                            <!-- TikTok -->
                            <a href="https://www.tiktok.com/@zahunyu" target="_blank">
                                <i class="fab fa-tiktok" style="font-size: 24px; color: black;"></i>
                            </a>
                        </div>
                        <ul style="list-style-type: none; padding: 0; margin: 0;">
                            <!-- WhatsApp -->
                            <li style="margin-bottom: 10px;">
                                <a href="https://wa.me/6282385289497" style="text-decoration: none; color: black;" target="_blank">WhatsApp</a>
                            </li>
                            <!-- Email -->
                            <li style="margin-bottom: 10px;">
                                <a href="mailto:contact@joyfulcream.com" style="text-decoration: none; color: black;">Email</a>
                            </li>
                            <!-- Alamat -->
                            <li>
                                <a href="https://goo.gl/maps/xyz123" style="text-decoration: none; color: black;" target="_blank">Alamat</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </footer>

            <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
            <script>
                function kurangiJumlah(kode) {
                    const inputJumlah = document.getElementById(`jumlah-${kode}`);
                    let currentValue = parseInt(inputJumlah.value);
                    if (currentValue > 1) {
                        inputJumlah.value = currentValue - 1;
                    }
                }

                function tambahJumlah(kode) {
                    const inputJumlah = document.getElementById(`jumlah-${kode}`);
                    let currentValue = parseInt(inputJumlah.value);
                    inputJumlah.value = currentValue + 1;
                }

                function validateQuantity(kode) {
                    const inputJumlah = document.getElementById(`jumlah-${kode}`);
                    let currentValue = parseInt(inputJumlah.value);
                    if (currentValue < 1) {
                        alert("Jumlah harus lebih dari 0.");
                        return false; // Mencegah form untuk disubmit
                    }
                    return true; // Mengizinkan form untuk disubmit
                }
            </script>
</body>

</html>