<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: loginn.php');
    exit();
}

include('koneksi.php');

$query_bantuan = "SELECT * FROM pertanyaan ORDER BY id DESC";
$result_bantuan = mysqli_query($koneksi, $query_bantuan);

if (!$result_bantuan) {
    die("Kesalahan query: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Bantuan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="bg-pink-50 text-gray-800 font-sans">

<!-- Navbar -->
<nav class="bg-white shadow px-6 py-4 flex justify-between items-center">
    <div class="text-2xl font-bold text-pink-600">Joyful & Cream</div>
    <div class="relative">
        <button id="userDropdown" class="text-2xl text-gray-700 hover:text-pink-600">
            <i class="fas fa-user-circle"></i>
        </button>
        <div id="dropdownMenu" class="hidden absolute right-0 mt-2 bg-white shadow-md rounded w-40 z-10">
            <form method="POST" action="logout.php">
                <button type="submit" class="block w-full text-left px-4 py-2 hover:bg-gray-100">Logout</button>
            </form>
        </div>
    </div>
</nav>

<!-- Layout -->
<div class="flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-pink-100 min-h-screen pt-6 px-4">
        <ul class="space-y-3">
            <li>
                <a href="dashboard.php" class="flex items-center text-gray-700 hover:text-pink-600">
                    <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                </a>
                <hr>
            </li>
            <li>
                <a href="pembeli.php" class="flex items-center text-gray-700 hover:text-pink-600">
                    <i class="fas fa-users mr-2"></i> Pembeli
                </a>
                <hr>
            </li>
            <li>
                <a href="kue.php" class="flex items-center text-gray-700 hover:text-pink-600">
                    <i class="fas fa-birthday-cake mr-2"></i> Daftar Kue
                </a>
                <hr>
            </li>
            <li>
                <a href="daftarpesanan.php" class="flex items-center text-gray-700 hover:text-pink-600">
                    <i class="fas fa-shopping-cart mr-2"></i> Daftar Pesanan
                </a>
                <hr>
            </li>
            <li>
                <a href="daftar_bantuan.php" class="flex items-center text-pink-700 font-semibold">
                    <i class="fas fa-question-circle mr-2"></i> Daftar Bantuan
                </a>
                <hr>
            </li>
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8">
        <h3 class="text-2xl font-semibold mb-4 flex items-center gap-2">
            <i class="fas fa-question-circle text-pink-600"></i> Daftar Bantuan
        </h3>
        <hr class="mb-6">

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow text-sm">
                <thead class="bg-pink-100 text-left">
                    <tr>
                        <th class="px-4 py-3 border-b">No</th>
                        <th class="px-4 py-3 border-b">Nama</th>
                        <th class="px-4 py-3 border-b">Email</th>
                        <th class="px-4 py-3 border-b">Pertanyaan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    if (mysqli_num_rows($result_bantuan) > 0) {
                        while ($row = mysqli_fetch_assoc($result_bantuan)) {
                            echo "<tr class='hover:bg-pink-50'>
                                    <td class='px-4 py-2 border-b'>{$no}</td>
                                    <td class='px-4 py-2 border-b'>{$row['nama']}</td>
                                    <td class='px-4 py-2 border-b'>{$row['email']}</td>
                                    <td class='px-4 py-2 border-b'>{$row['pertanyaan']}</td>
                                  </tr>";
                            $no++;
                        }
                    } else {
                        echo "<tr><td colspan='4' class='text-center px-4 py-4'>Tidak ada pertanyaan bantuan</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</div>

<script>
    // Dropdown toggle
    document.getElementById('userDropdown').addEventListener('click', function () {
        document.getElementById('dropdownMenu').classList.toggle('hidden');
    });
</script>

</body>
</html>
