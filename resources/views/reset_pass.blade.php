<div>
    <!-- Order your soul. Reduce your wants. - Augustine -->
</div>
<?php
// Nama File: reset_pass.php
// Deskripsi: File ini berfungsi untuk mereset/mengganti kata sandi pembeli dengan menggunakan email yg pembeli pakai saat registrasi.
// Dibuat oleh: Aprisius Togar Sihombing - NIM: 3312401085
// Tanggal: 19 Desember 2024

// Koneksi ke database (pastikan koneksi.php berisi konfigurasi database yang benar)
require_once "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data form
    $email = $_POST['email'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Validasi email dan password
    if ($new_password !== $confirm_password) {
        $message = "Konfirmasi kata sandi tidak cocok.";
    } else {
        // Cari pengguna berdasarkan email
        $query = "SELECT * FROM user WHERE email = ?";
        $stmt = mysqli_prepare($koneksi, $query);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);

        if ($user) {
            // Hash kata sandi baru
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            // Update kata sandi pengguna
            $update_query = "UPDATE user SET password = ? WHERE email = ?";
            $update_stmt = mysqli_prepare($koneksi, $update_query);
            mysqli_stmt_bind_param($update_stmt, "ss", $hashed_password, $email);

            if (mysqli_stmt_execute($update_stmt)) {
                $message = "Kata sandi berhasil diperbarui!";
            } else {
                $message = "Terjadi kesalahan saat memperbarui kata sandi.";
            }
        } else {
            $message = "Email tidak ditemukan.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Kata Sandi - Joyful & Cream</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <style>
        body {
            background-color: #FAE8ED;
            background-image: url('https://i.pinimg.com/736x/43/7f/1e/437f1e336fdb4c9757c1e033941e52f3.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            color: #2B1818;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .navbar .store-name {
            font-family: 'Cooper Black', cursive;
            text-decoration: none;
            font-size: 22px;
            font-weight: bold;
            margin-right: auto;
        }

        .login-container {
            max-width: 400px;
            margin: auto;
            margin-top: 100px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-container h2 {
            margin-bottom: 20px;
        }

        .label {
            display: block;
            margin-bottom: 5px;
            font-size: 15px;
            color: #555;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn-primary {
            background-color: #FDD5DF;
            border: none;
            color: #2B1818;
            padding: 7px;
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #ffc8dd;
        }

        .btn-primary {
           background-color: #FDD5DF;
           border: none;
           color: #2B1818;
           padding: 7px;
           border-radius: 5px;
           margin-bottom: 5px;
           width: 100%;
        }
        .btn-secondary {
            color: #2B1818;
            border: none;
            padding: 9px;
            border-radius: 4px;
            width: 100%;
            display: block;
            margin: 0 auto;
            text-align: center;
        }

        .alert {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

   <!-- Navbar -->
   <div class="navbar">
      <!-- Nama toko -->
      <div class="store-name">Joyful & Cream</div>
    </div>

    <!-- Login Form -->
    <div class="login-container" id="loginForm">
      <h2 class="text-center"> Reset Kata Sandi</h2>
      <!-- Pesan alert -->
      <?php if (isset($message)): ?>
          <div class="alert alert-warning"><?= htmlspecialchars($message) ?></div>
      <?php endif; ?>

      <form method="POST" action="#">
        <div class="mb-3">
          <div class="form-group">
            <label for="email" class="label">Email</label>
            <input type="email" id="email" class="form-control" name="email" placeholder="Masukkan email Anda" required>
          </div>
        </div>

        <div class="mb-3">
          <div class="form-group">
            <label for="new_password" class="label">Kata Sandi Baru</label>
            <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Masukkan Kata Sandi Baru" required>
          </div>
        </div>

        <div class="mb-3">
          <div class="form-group">
            <label for="confirm_password" class="label">Konfirmasi Kata Sandi Baru</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Konfirmasi Kata Sandi Baru" required>
          </div>
        </div>

        <div class="form-group">
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          <a href="loginn.php" class="btn btn-secondary">Kembali</a>
        </div>
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
