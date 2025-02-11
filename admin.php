<?php
include 'config.php';
session_start();
if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Anda harus login sebagai admin!'); window.location='index.php';</script>";
    exit;
}

// Ambil daftar mobil yang sedang disewa
$result = $conn->query("SELECT rentals.id, cars.nama_mobil, rentals.nama_penyewa, rentals.tanggal_mulai, rentals.tanggal_selesai
                        FROM rentals 
                        JOIN cars ON rentals.id_mobil = cars.id
                        WHERE rentals.status = 'Dipinjam'");

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Konfirmasi Pengembalian</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Admin Panel</a>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </nav>

    <!-- Container -->

    <div class="container mt-4">
        <h2 class="text-center">Daftar Mobil yang Sedang Disewa</h2>
        
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Mobil</th>
                    <th>Penyewa</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    $no = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$no}</td>
                                <td>{$row['nama_mobil']}</td>
                                <td>{$row['nama_penyewa']}</td>
                                <td>{$row['tanggal_mulai']}</td>
                                <td>{$row['tanggal_selesai']}</td>
                                <td>
                                    <a href='konfirmasi.php?id={$row['id']}' class='btn btn-success' onclick='return confirm(\"Konfirmasi pengembalian mobil?\")'>Konfirmasi</a>
                                </td>
                              </tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>Tidak ada mobil yang sedang disewa.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>
