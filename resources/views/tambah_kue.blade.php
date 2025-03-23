<?php
// Nama File: tambah_kue.php
// Deskripsi: File ini digunakan untuk fungsi menambahkan data kue dari form pengisian data kue ke database melalui dashboard admin
// Dibuat oleh: Muhammad Rizky Febrian - NIM: 3312401082
// Tanggal: 07 Desember 2024

// include koneksi ke database
include 'koneksi.php';

// Ambil data dari form dan sanitasi input untuk mencegah SQL Injection
$kode = mysqli_real_escape_string($koneksi, $_POST['kode']);
$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
$rasa = mysqli_real_escape_string($koneksi, $_POST['rasa']);
$detail = mysqli_real_escape_string($koneksi, $_POST['detail']);
$ukuran = mysqli_real_escape_string($koneksi, $_POST['ukuran']);
$harga = mysqli_real_escape_string($koneksi, $_POST['harga']);

// Validasi apakah kode kue sudah ada dalam database
$checkQuery = "SELECT * FROM kue WHERE kode = '$kode'";
$result = mysqli_query($koneksi, $checkQuery);

if (mysqli_num_rows($result) > 0) {
    // Jika kode sudah ada, tampilkan peringatan dan hentikan eksekusi
    echo "<script>alert('Data dengan Kode Kue $kode sudah ada!'); window.history.back();</script>";
    exit();
}

// Jika tidak ada duplikasi, proses upload gambar
// Tentukan direktori penyimpanan gambar
$targetDir = "uploads/";
// Tentukan path file gambar yang akan diupload
$targetFile = $targetDir . basename($gambar['name']);
// Pindahkan file gambar dari lokasi sementara ke direktori tujuan
move_uploaded_file($gambar['tmp_name'], $targetFile);

// Pastikan file gambar ada dan tidak ada error saat upload
if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == UPLOAD_ERR_OK) {
    $target_dir = "uploads/"; // Direktori tempat gambar disimpan
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validasi ukuran file (maksimum 2MB)
    if ($_FILES["gambar"]["size"] > 2000000) {
        echo "<script>alert('Ukuran file terlalu besar. Maksimum 2MB.'); window.location.href = 'kue.php';</script>";
        $uploadOk = 0;
    }

    // Validasi format gambar (hanya JPG, JPEG, PNG, dan GIF yang diperbolehkan)
    if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
        echo "<script>alert('Hanya format JPG, JPEG, PNG & GIF yang diperbolehkan.'); window.location.href = 'kue.php';</script>";
        $uploadOk = 0;
    }

    // Jika semua validasi lolos, lakukan penyimpanan gambar dan data kue
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            // Simpan data kue beserta nama gambar ke database
            $input = mysqli_query($koneksi, "INSERT INTO kue (kode, nama, rasa, detail, ukuran, harga, gambar) 
                                             VALUES ('$kode', '$nama', '$rasa', '$detail', '$ukuran', '$harga', '" . basename($target_file) . "')")
                                             or die(mysqli_error($koneksi));

            // Tampilkan pesan berhasil atau gagal menyimpan data
            if ($input) {
                echo "<script>alert('Data Berhasil Disimpan'); window.location.href = 'kue.php';</script>";
            } else {
                echo "<script>alert('Gagal Menyimpan Data'); window.location.href = 'kue.php';</script>";
            }
        } else {
            // Jika gagal mengunggah gambar
            echo "<script>alert('Gagal mengunggah gambar.'); window.location.href = 'kue.php';</script>";
        }
    }
} else {
    // Jika file gambar tidak valid
    echo "<script>alert('Harap pilih gambar yang valid.'); window.location.href = 'kue.php';</script>";
}
?>