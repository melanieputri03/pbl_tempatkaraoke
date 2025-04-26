<div>
    <!-- Live as if you were to die tomorrow. Learn as if you were to live forever. - Mahatma Gandhi -->
</div>
<!--    Nama File: registrasi.php
        Deskripsi: Halaman untuk pengguna melakukan registrasi. 
        Dibuat oleh: Muhammad Rizky Febrian - NIM: 3312401082
        Tanggal: 11 November 2024 
-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Buat Akun - Joyful & Cream</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <style>
      body {
        background-color: #FAE8ED;
        background-image: url('https://i.pinimg.com/736x/43/7f/1e/437f1e336fdb4c9757c1e033941e52f3.jpg'); /* Ganti dengan path gambar yang kamu inginkan */
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
            /* Nama toko */
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
        background: rgba(255, 255, 255, 0.8); /* Warna form login dengan transparansi */
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      .login-container h2 {
        margin-bottom: 20px;
      }

      .form-control {
        border-radius: 5px;
        margin-bottom: 10px;
      }

      .btn-primary {
        background-color: #FDD5DF;
        border: none;
        color: #2B1818;
        padding: 10px;
        border-radius: 5px;
      }

      .btn-primary:hover {
        background-color: #ffc8dd;
      }

      .pink-button {
    background-color: #ffc8dd;
    color: #2B1818;
    border: none;
    padding: 10px; /* Tambahkan padding untuk tombol */
    border-radius: 5px;
    width: 100%; /* Tombol memenuhi lebar container */
    display: block; /* Mengubah tombol menjadi elemen block */
    margin: 0 auto; /* Memastikan tombol berada di tengah */
    text-align: center; /* Menyelaraskan teks di tengah */
    }
    </style>
  </head>
  <body style="background-color: #FAE8ED"></body>
    <!-- Navbar -->
    <div class="navbar">
      <!-- Nama toko -->
      <div class="store-name">Joyful & Cream</div>
    </div>
    <!-- registrasi-->
    <div class="login-container" id="loginForm">
      <h2 class="text-center">Buat Akun</h2>
      <form method="POST" action="proses_regis.php">
        <div class="mb-3">
          <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" required>
        </div>
        <div class="mb-3">
          <input type="text" class="form-control" name="username" placeholder="Nama Pengguna" required>
        </div>
        <div class="mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email" required>
        </div>
        <div class="mb-3">
          <input type="text" class="form-control" name="no_hp" placeholder="No. Handphone" required>
        </div>
        <div class="mb-3">
          <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
        </div>
        <div class="mb-3">
          <input type="password" class="form-control" name="password" placeholder="Kata Sandi" required>
        </div>
        <div class="form-group">
          <button type="submit" class="pink-button">Buat Akun</button>
      </div>
      </form>
      <br>
      <p class="text-center">Sudah punya akun? <a href="loginn.php" class="link-primary">Klik Disini</a></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
