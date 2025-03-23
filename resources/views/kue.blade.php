<?php
// Nama File: kue.php
// Deskripsi: File ini digunakan untuk memeriksa role dari user 
//            yang login apakah sebagai admin atau penjual.
// Dibuat oleh: Muhammad Rizky Febrian - NIM: 3312401082
// Tanggal: 07 Desember 2024

session_start();

// Periksa apakah role adalah admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
  header('Location: loginn.php');
  exit();
}

// Koneksi ke database
include('koneksi.php');

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="dashboard_css.css" rel="stylesheet">
  <title>Dashboard Joyful & Cream</title>
</head>

<body>

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
      </div>
    </nav>

    <!-- Dashboard Layout -->
    <div class="row g-0 mt-5">
      <!-- Sidebar -->
      <div class="col-md-2 bg-pink mt-2 pt-4">
        <ul class="nav flex-column ms-3 mb-5">
          <li class="nav-item">
            <a class="nav-link active" href="dashboard.php"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
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

      <!-- Daftar Kue -->
      <div class="col-md-10 p-5 pt-2">
        <h3><i class="fas fa-birthday-cake me-2"></i> Daftar Kue</h3>
        <hr>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#tambahDataModal">
          <i class="fas fa-birthday-cake me-2"></i>TAMBAH DATA KUE
        </button>

        <!-- Modal Tambah Data -->
        <div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="tambahDataLabel">Tambah Data Kue</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="tambah_kue.php" method="POST" enctype="multipart/form-data">
                  <div class="mb-3">
                    <label for="kode" class="form-label">Kode Kue</label>
                    <input type="text" class="form-control" id="kode" name="kode" required>
                  </div>
                  <div class="mb-3">
                    <label for="nama" class="form-label">Nama Kue</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                  </div>
                  <div class="mb-3">
                    <label for="rasa" class="form-label">Rasa Kue</label>
                    <input type="text" class="form-control" id="rasa" name="rasa" required>
                  </div>
                  <div class="mb-3">
                    <label for="detail" class="form-label">Detail Kue</label>
                    <input type="text" class="form-control" id="detail" name="detail" required>
                  </div>
                  <div class="mb-3">
                    <label for="ukuran" class="form-label">Ukuran Kue</label>
                    <input type="text" class="form-control" id="ukuran" name="ukuran" required>
                  </div>
                  <div class="mb-3">
                    <label for="harga" class="form-label">Harga Kue</label>
                    <input type="number" class="form-control" id="harga" name="harga" required>
                  </div>
                  <div class="mb-3">
                    <label for="gambar" class="form-label">Foto Kue</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal Edit Data -->
        <div class="modal fade" id="editDataModal" tabindex="-1" aria-labelledby="editDataLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editDataLabel">Edit Data Kue</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="ubah_kue.php" method="POST" enctype="multipart/form-data">
                  <input type="hidden" id="edit-kode" name="kode">
                  <div class="mb-3">
                    <label for="edit-nama" class="form-label">Nama Kue</label>
                    <input type="text" class="form-control" id="edit-nama" name="nama" required>
                  </div>
                  <div class="mb-3">
                    <label for="edit-rasa" class="form-label">Rasa Kue</label>
                    <input type="text" class="form-control" id="edit-rasa" name="rasa" required>
                  </div>
                  <div class="mb-3">
                    <label for="edit-detail" class="form-label">Detail Kue</label>
                    <input type="text" class="form-control" id="edit-detail" name="detail" required>
                  </div>
                  <div class="mb-3">
                    <label for="edit-ukuran" class="form-label">Ukuran Kue</label>
                    <input type="text" class="form-control" id="edit-ukuran" name="ukuran" required>
                  </div>
                  <div class="mb-3">
                    <label for="edit-harga" class="form-label">Harga Kue</label>
                    <input type="number" class="form-control" id="edit-harga" name="harga" required>
                  </div>
                  <div class="mb-3">
                    <label for="edit-gambar" class="form-label">Gambar Kue</label>
                    <input type="file" class="form-control" id="edit-gambar" name="gambar" accept="image/*">
                    <div class="mt-2">
                      <img id="edit-gambar-preview" width="100" height="100" src="" alt="Gambar Kue Lama">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Update</button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- tabel kue -->
        <table class="table table-striped table-bordered">
          <thead class="bg-cream">
            <tr>
              <th scope="col">NO</th>
              <th scope="col">KODE</th>
              <th scope="col">NAMA KUE</th>
              <th scope="col">RASA</th>
              <th scope="col">DETAIL</th>
              <th scope="col">UKURAN</th>
              <th scope="col">HARGA</th>
              <th scope="col">GAMBAR</th> <!-- Kolom gambar -->
              <th scope="col">AKSI</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include 'koneksi.php';
            $query = mysqli_query($koneksi, "SELECT * FROM kue");
            $no = 1;
            while ($data = mysqli_fetch_assoc($query)) {
            ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['kode']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['rasa']; ?></td>
                <td><?php echo $data['detail']; ?></td>
                <td><?php echo $data['ukuran']; ?></td>
                <td><?php echo $data['harga']; ?></td>
                <td>
                  <img src="uploads/<?php echo $data['gambar']; ?>" alt="Gambar Kue" width="100" height="100">
                </td>
                <td>
                  <button class="btn btn-success btn-sm me-1 edit-button" data-bs-toggle="modal"
                    data-bs-target="#editDataModal"
                    data-kode="<?php echo $data['kode']; ?>"
                    data-nama="<?php echo $data['nama']; ?>"
                    data-rasa="<?php echo $data['rasa']; ?>"
                    data-detail="<?php echo $data['detail']; ?>"
                    data-ukuran="<?php echo $data['ukuran']; ?>"
                    data-harga="<?php echo $data['harga']; ?>"
                    data-gambar="<?php echo $data['gambar']; ?>"> <!-- Menambahkan data-gambar -->
                    <i class="fas fa-edit"></i> Edit
                  </button>
                  <a href="hapus_kue.php?kode=<?php echo $data['kode']; ?>" class="btn btn-danger btn-sm">
                    <i class="fas fa-trash-alt"></i> Delete
                  </a>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>

      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          const editButtons = document.querySelectorAll('.edit-button');
          editButtons.forEach(button => {
            button.addEventListener('click', function() {
              const kode = this.getAttribute('data-kode');
              const nama = this.getAttribute('data-nama');
              const rasa = this.getAttribute('data-rasa');
              const detail = this.getAttribute('data-detail');
              const ukuran = this.getAttribute('data-ukuran');
              const harga = this.getAttribute('data-harga');
              const gambar = this.getAttribute('data-gambar');

              document.getElementById('edit-kode').value = kode;
              document.getElementById('edit-nama').value = nama;
              document.getElementById('edit-rasa').value = rasa;
              document.getElementById('edit-detail').value = detail;
              document.getElementById('edit-ukuran').value = ukuran;
              document.getElementById('edit-harga').value = harga;
              document.getElementById('edit-gambar-preview').src = 'uploads/' + gambar;
            });
          });
        });
      </script>
  </body>

</html>