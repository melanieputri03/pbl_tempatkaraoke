<?php
// Nama File: ubah_kue.php
// Deskripsi: File ini digunakan untuk fungsi menambahkan data kue dari form pengisian data kue ke database melalui dashboard admin
// Dibuat oleh: Muhammad Rizky Febrian - NIM: 3312401082
// Tanggal: 07 Desember 2024

// Include koneksi ke database
include 'koneksi.php';

// Ambil data dari form
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$rasa = $_POST['rasa'];
$detail = $_POST['detail'];
$ukuran = $_POST['ukuran'];
$harga = $_POST['harga'];

// Cek apakah ada gambar baru
if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
    // Ambil informasi file gambar
    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    $gambar_type = $_FILES['gambar']['type'];
    $gambar_size = $_FILES['gambar']['size'];

    // Tentukan folder tujuan upload
    $upload_dir = 'uploads/';
    $target_file = $upload_dir . basename($gambar);

    // Validasi jenis gambar
    $valid_types = array('image/jpeg', 'image/png', 'image/gif');
    if (in_array($gambar_type, $valid_types)) {
        // Proses upload gambar
        if (move_uploaded_file($gambar_tmp, $target_file)) {
            // Update data kue di database, termasuk gambar baru
            $result = mysqli_query($koneksi, "UPDATE kue SET nama='$nama', rasa='$rasa', detail='$detail', ukuran='$ukuran', harga='$harga', gambar='$gambar' WHERE kode='$kode'");
            
            if ($result) {
                // Redirect ke halaman daftar kue setelah berhasil update
                header("Location: kue.php");
                exit;
            } else {
                echo "Gagal memperbarui data.";
            }
        } else {
            echo "Gagal meng-upload gambar.";
        }
    } else {
        echo "Jenis file tidak valid. Hanya gambar yang diperbolehkan.";
    }
} else {
    // Jika tidak ada gambar yang di-upload, hanya update data tanpa mengganti gambar
    $result = mysqli_query($koneksi, "UPDATE kue SET nama='$nama', rasa='$rasa', detail='$detail', ukuran='$ukuran', harga='$harga' WHERE kode='$kode'");
    
    if ($result) {
        // Redirect ke halaman daftar kue setelah berhasil update
        header("Location: kue.php");
        exit;
    } else {
        echo "Gagal memperbarui data.";
    }
}
?>