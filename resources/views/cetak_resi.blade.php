<?php
// Nama File: cetak_resi.php
// Deskripsi: File ini digunakan untuk menampilkan resi pesanan berdasarkan ID pesanan atau username yang diberikan.
// Dibuat oleh: Muhammad Rizky Febrian - NIM: 3312401082
// Tanggal: 29 Desember 2024

// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "joyful");

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Ambil data pesanan berdasarkan ID atau Username
$id_pesanan = isset($_GET['id_pesanan']) ? $_GET['id_pesanan'] : '';
$username = isset($_GET['username']) ? $_GET['username'] : '';

// Menentukan query SQL berdasarkan parameter yang tersedia
if ($id_pesanan != '') {
    // Jika ID pesanan tersedia, ambil data berdasarkan ID
    $query = "SELECT * FROM pesanan WHERE id = '$id_pesanan'";
} elseif ($username != '') {
    // Jika username tersedia, ambil data pesanan terbaru berdasarkan username
    $query = "SELECT * FROM pesanan WHERE username = '$username' ORDER BY created_at DESC LIMIT 1";
} else {
    die("ID pesanan atau username tidak ditemukan."); // Jika keduanya tidak tersedia, hentikan proses
}

// Menjalankan query ke database
$result = $koneksi->query($query);

// Cek apakah data ditemukan
if ($result && $result->num_rows > 0) {
    // Jika data ditemukan, simpan hasilnya ke dalam variabel
    $data = $result->fetch_assoc();
?>

    <!DOCTYPE html>
    <html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resi Pembayaran</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 20px;
                padding: 20px;
                border: 1px solid #ccc;
                border-radius: 10px;
                max-width: 600px;
                background-color: #f9f9f9;
            }

            h1 {
                text-align: center;
                color: #333;
            }

            .detail {
                margin: 10px 0;
            }

            .detail strong {
                color: #555;
            }

            .total-price {
                font-size: 1.2em;
                font-weight: bold;
                color: #d9534f;
            }

            .footer {
                text-align: center;
                margin-top: 20px;
                font-size: 0.9em;
                color: #777;
            }

            .store-info {
                text-align: center;
                margin-bottom: 20px;
            }

            .store-info strong {
                display: block;
                font-size: 1.1em;
                margin-bottom: 5px;
            }
        </style>
    </head>

    <body>
        <div class="store-info">
            <strong>JOYFUL</strong>
        </div>

        <h1>Resi Pembayaran</h1>

        <div class="detail"><strong>Kode Pesanan:</strong> <?= htmlspecialchars($data['id']); ?></div>
        <div class="detail"><strong>Nama Pelanggan:</strong> <?= htmlspecialchars($data['username']); ?></div>
        <div class="detail"><strong>Nama Produk:</strong> <?= htmlspecialchars($data['nama_kue']); ?></div>
        <div class="detail"><strong>Jumlah:</strong> <?= htmlspecialchars($data['quantity']); ?> buah</div>
        <div class="detail"><strong>Total Harga:</strong> Rp <?= number_format($data['total_harga'], 0, ',', '.'); ?></div>
        <div class="detail"><strong>Tanggal Pengambilan:</strong> <?= htmlspecialchars($data['tanggal']); ?></div>
        <div class="detail"><strong>Waktu Pengambilan:</strong> <?= htmlspecialchars($data['waktu']); ?></div>
        <div class="detail"><strong>Catatan:</strong> <?= htmlspecialchars($data['catatan']); ?></div>

        <div class="footer">
            Pembayaran telah diterima. Terima kasih atas kepercayaan Anda!<br>
            <small>Resi ini dicetak secara otomatis dan berlaku sebagai bukti sah transaksi.</small>
        </div>
        <script>
            window.print();
        </script>
    </body>

    </html>

<?php
} else {
    // Jika tidak ada data ditemukan, tampilkan pesan
    echo "Pesanan tidak ditemukan.";
}

// Menutup koneksi ke database
$koneksi->close();
?>