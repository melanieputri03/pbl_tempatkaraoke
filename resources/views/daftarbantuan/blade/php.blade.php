<?php
// Nama File: bantuan.php
// Deskripsi: Halaman admin/penjual untuk menampilkan daftar pertanyaan 
//            yang dikirim oleh pembeli melalui form.
// Dibuat oleh: Muhammad Rizky Febrian - NIM: 3312401082
// Tanggal: 20 Desember 2024 


session_start();

// Periksa apakah role adalah admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: loginn.php');
    exit();
}

// Koneksi ke database
include('koneksi.php');

// Query untuk mengambil data pertanyaan bantuan
$query_bantuan = "SELECT * FROM pertanyaan ORDER BY id DESC";
$result_bantuan = mysqli_query($koneksi, $query_bantuan);

if (!$result_bantuan) {
    die("Kesalahan query: " . mysqli_error($koneksi));
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="dashboard_css.css" rel="stylesheet">
    <title>Daftar Bantuan</title>
</head>

<body style="background-color: #FAE8ED">
    <!-- Navbar -->
    <nav class="navbar">
        <div class="store-name">Joyful & Cream</div>
        <div class="dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user-circle"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li>
                    <form method="POST" action="logout.php">
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Layout -->
    <div class="row g-0 mt-5">
        <!-- Sidebar -->
        <div class="col-md-2 bg-pink mt-2 pt-4">
            <ul class="nav flex-column ms-3 mb-5">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pembeli.php"><i class="fas fa-users me-2"></i>Pembeli</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kue.php"><i class="fas fa-birthday-cake me-2"></i>Daftar Kue</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="daftarpesanan.php"><i class="fas fa-shopping-cart me-2"></i>Daftar Pesanan</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="daftar_bantuan.php"><i class="fas fa-question-circle me-2"></i>Daftar Bantuan</a>
                    <hr class="bg-secondary">
                </li>
            </ul>
        </div>

        <!-- Content -->
        <div class="col-md-10 p-5 pt-2">
            <h3><i class="fas fa-question-circle me-2"></i> Daftar Bantuan</h3>
            <hr>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Pertanyaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        if (mysqli_num_rows($result_bantuan) > 0) {
                            while ($row = mysqli_fetch_assoc($result_bantuan)) {
                                echo "<tr>
                                        <td>{$no}</td>
                                        <td>{$row['nama']}</td>
                                        <td>{$row['email']}</td>
                                        <td>{$row['pertanyaan']}</td>
                                      </tr>";
                                $no++;
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center'>Tidak ada pertanyaan bantuan</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>