<?php
// Nama File: profil.php
// Deskripsi: Halaman untuk menampilkan dan mengedit profil pengguna, termasuk username, alamat, nomor HP, dan password. 
//            Mengambil data dari database berdasarkan user yang sedang login dan memperbarui informasi pengguna di database.
// Dibuat oleh: Aprisius Togar Sihombing - NIM: 3312401085
// Tanggal: 19 Desember 2024

// Koneksi ke database
require_once "koneksi.php";

// Mulai sesi
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Pastikan pengguna login
    exit;
}

$user_id = $_SESSION['user_id'];

// Ambil data pengguna dari database
$query = "SELECT * FROM user WHERE id = ?";
$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

if (!$user) {
    die("Data pengguna tidak ditemukan.");
}

// Update data profil
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $no_hp = mysqli_real_escape_string($koneksi, $_POST['no_hp']);

    $update_query = "UPDATE user SET username = ?, alamat = ?, no_hp = ? WHERE id = ?";
    $update_stmt = mysqli_prepare($koneksi, $update_query);
    mysqli_stmt_bind_param($update_stmt, "sssi", $username, $alamat, $no_hp, $user_id);

    if (mysqli_stmt_execute($update_stmt)) {
        // Update password jika diisi
        if (!empty($_POST['current_password']) && !empty($_POST['new_password']) && !empty($_POST['confirm_password'])) {
            $current_password = $_POST['current_password'];
            $new_password = $_POST['new_password'];
            $confirm_password = $_POST['confirm_password'];

            // Verifikasi password lama
            if (!password_verify($current_password, $user['password'])) {
                echo "<script>alert('Password lama salah!');</script>";
            } elseif ($new_password !== $confirm_password) {
                echo "<script>alert('Konfirmasi password tidak cocok!');</script>";
            } else {
                // Hash password baru
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $update_password_query = "UPDATE user SET password = ? WHERE id = ?";
                $update_password_stmt = mysqli_prepare($koneksi, $update_password_query);
                mysqli_stmt_bind_param($update_password_stmt, "si", $hashed_password, $user_id);

                if (mysqli_stmt_execute($update_password_stmt)) {
                    echo "<script>alert('Profil dan Password berhasil diperbarui!');</script>";
                } else {
                    echo "<script>alert('Terjadi kesalahan saat mengubah password.');</script>";
                }
            }
        } else {
            echo "<script>alert('Profil berhasil diperbarui!');</script>";
        }

        echo "<script>window.location.href = 'profil.php';</script>";
        exit;
    } else {
        echo "<script>alert('Terjadi kesalahan saat menyimpan data.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Profil</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Pastikan Font Awesome dimuat -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        .user-icon {
            font-size: 40px;
            color: #2B1818;
            margin-right: 10px;
        }

        .profile-heading {
            display: flex;
            align-items: center; 
            font-size: 2rem;
            margin-left: 10px;  
        }

        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 30px;
            text-decoration: none;
            color: black;
        }

        .btn-primary {
           background-color: #FDD5DF;
           border: none;
           color: #2B1818;
           padding: 7px;
           border-radius: 5px;
           margin-bottom: 5px;
           
        }

        .form-container {
            max-width: 600px; 
            margin: 0 auto;
            margin-left: 10px; 
        }

        .form-control {
            max-width: 400px; 
            margin-bottom: 10px;
        }

        .form-control-textarea {
            max-width: 400px; 
        }
    </style>
</head>
<body style="background-color: #FFF8F8; padding: 20px;">

<div class="container position-relative">
    <!-- Menambahkan ikon profile di sebelah kiri -->
    <h1 class="mb-4 profile-heading">
        <i class="fas fa-user-circle user-icon"></i> Pengaturan Profil
    </h1>

    <form method="POST" action="profil.php" class="form-container">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= htmlspecialchars($user['username']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control form-control-textarea" id="alamat" name="alamat" rows="2" required><?= htmlspecialchars($user['alamat']) ?></textarea>
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label">Nomor HP</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= htmlspecialchars($user['no_hp']) ?>" required>
        </div>

    <!--Edit Password -->
        <div class="mb-3">
            <label for="current_password" class="form-label">Password Lama</label>
            <input type="password" class="form-control" id="current_password" name="current_password">
        </div>
        <div class="mb-3">
            <label for="new_password" class="form-label">Password Baru</label>
            <input type="password" class="form-control" id="new_password" name="new_password">
        </div>
        <div class="mb-3">
            <label for="confirm_password" class="form-label">Konfirmasi Password Baru</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password">
        </div>

        <div class="form-group">
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="halaman_utama.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>