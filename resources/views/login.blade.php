<div>
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
</div>
<!--    Nama File: loginn.php
        Deskripsi: Halaman untuk pengguna melakukan login. 
        Dibuat oleh: Anastasya Floresha Dominiq Ginting - NIM: 3312401068
        Tanggal: 11 November 2024 
-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Akun - Joyful & Cream</title>
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
           padding: 7px;
           border-radius: 5px;
           margin-bottom: 5px;
           width: 100%;
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
  <body>
    <!-- Navbar -->
    <div class="navbar">
      <!-- Nama toko -->
      <div class="store-name">Joyful & Cream</div>
    </div>

    <!-- login-->
    <div class="login-container" id="loginForm">
      <h2 class="text-center">Masuk</h2>
      <div id="alert-container"></div>
      <form method="POST" action="proses_login.php">
        <br>
        <div class="mb-3">
          <div class="input-group">
            <input
              type="text"
              class="form-control"
              id="username"
              name="username"
              placeholder="Nama Pengguna"
              required
            />
          </div>
        </div>
        <div class="mb-3">
          <div class="input-group">
            <input
              type="password"
              class="form-control"
              id="password"
              name="password"
              placeholder="Kata Sandi"
              required
            />
          </div>
        </div> 
        <div class="form-group">
        <button type="submit" class="btn btn-primary">Masuk</button>
      </div>
      
      </form>
      <br>
      <p class="text-center"><a href="reset_pass.php" class="link-primary">Lupa Kata Sandi?</a></p>
      <p class="text-center">
        Belum punya akun? <a href="registrasi.php" class="link-primary">Klik Disini</a>
      </p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
