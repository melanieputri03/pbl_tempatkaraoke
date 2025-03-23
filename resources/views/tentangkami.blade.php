<!--    Nama File: tentangkami.php
        Deskripsi: Halaman untuk pengguna melakukan registrasi. 
        Dibuat oleh: Zahrah Nazihah Ginting - NIM: 3312401077
        Tanggal: 15 Desember 2024 
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Joyful & Cream</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* General Body Styling */
        body {
                font-family: 'Georgia', serif, Times, serif;
                margin: 0;
                padding: 0;
                background-color: #fff0f3;
                color: #333;
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

        /* Main Container */
        .container {
            max-width: 800px;
            margin: 80px auto 20px; /* 80px untuk menyesuaikan posisi navbar fixed */
            padding: 20px;
        }

        /* Heading Styles */
        h1, h2 {
            text-align: center;
            color: #d78c9b;
        }

        h1 {
            font-size: 2em;
            margin-bottom: 20px;
        }

        .section {
            margin-bottom: 40px;
        }

        .section h2 {
            font-size: 1.5em;
            margin-bottom: 15px;
        }

        .section p {
            line-height: 1.6;
            text-align: justify;
        }

        /* Vision and Mission Cards */
        .vision-mission {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .vision-mission .card {
            flex: 1 1 calc(50% - 20px); /* Membagi menjadi dua kolom */
            background-color: #ffc8dd;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease;
        }

        .vision-mission .card:hover {
            transform: scale(1.05); /* Efek hover pada card */
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
        }

        .card h3 {
            font-size: 1.2em;
            margin-bottom: 10px;
            color: #2B1818;
        }

        .card p {
            font-size: 0.95em;
            color: #555;
        }

        /* Footer */
        footer {
            text-align: center;
            margin-top: 40px;
            padding: 10px 0;
            background-color: #ffc8dd;
            color: #333;
            font-size: 0.9em;
        }

        footer p {
            margin: 0;
            line-height: 1.5;
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            .vision-mission {
                flex-direction: column;
            }

            .vision-mission .card {
                flex: 1 1 100%; /* Mengatur satu kolom di layar kecil */
            }

            .navbar {
                flex-wrap: wrap;
                justify-content: center;
            }

            .navbar .store-name {
                font-size: 20px;
                margin-bottom: 10px;
            }

            .nav-Menu a {
                margin: 5px;
                font-size: 14px;
            }

            .container {
                padding: 10px;
            }
        }
    </style>
</head>
<body>

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
                <form action="halaman_utama.php" method="get" class="d-flex">
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
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="riwayat_pemesanan.php">Riwayat Pemesanan</a></li>
                        <li><hr class="dropdown-divider"></li>
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

    <!-- Main Content -->
    <div class="container mt-5 pt-5">
        <h1 class="text-center my-4" style="font-family: 'Roboto', sans-serif; font-weight: bold;">Tentang Kami</h1>

        <!-- Siapa Kami -->
        <section id="about-us" class="section mb-5">
            <h2>Siapa Kami?</h2>
            <p>Joyful & Cream adalah sebuah brand yang didedikasikan untuk memberikan pengalaman terbaik kepada pelanggan melalui produk kami yang berkualitas tinggi. Kami percaya bahwa setiap momen dapat menjadi lebih istimewa dengan sedikit sentuhan manis.</p>
        </section>

        <!-- Visi dan Misi -->
        <section id="vision-mission" class="section mb-5">
            <h2>Visi dan Misi</h2>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card p-3 shadow-sm">
                        <h3 class="text-center">Visi</h3>
                        <p class="text-center">Menciptakan kebahagiaan sederhana bagi setiap orang melalui produk-produk kami yang penuh cinta dan inovasi.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card p-3 shadow-sm">
                        <h3 class="text-center">Misi</h3>
                        <ul>
                            <li>Memberikan produk berkualitas tinggi dengan harga yang terjangkau.</li>
                            <li>Mendukung komunitas lokal dengan bahan-bahan pilihan terbaik.</li>
                            <li>Meningkatkan kesadaran akan kebahagiaan dalam hal-hal kecil.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Nilai-Nilai Kami -->
        <section id="values" class="section mb-5">
            <h2>Nilai-Nilai Kami</h2>
            <p>Kami percaya pada kejujuran, inovasi, dan pelayanan yang ramah. Dengan semangat tersebut, kami terus berusaha menjadi lebih baik dan memberikan kontribusi positif bagi pelanggan dan komunitas kami.</p>
        </section>

        <!-- Mitra Kerjasama -->
        <section id="partners" class="section mb-5">
            <h2>Mitra Kerjasama</h2>
            <p>Kami dengan bangga bekerja sama dengan <b>Collete & Lola</b>, salah satu brand ternama dalam dunia kue dan dessert. Kolaborasi ini memungkinkan kami untuk menghadirkan produk-produk yang lebih inovatif dan berkualitas tinggi untuk pelanggan setia kami.</p>
        </section>
    </div>

    <!-- Footer -->
    <footer class="text-center py-4" style="background-color: #FDD5DF; color: #2B1818;">
        <p>© 2024 Joyful & Cream. Semua Hak Dilindungi.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>