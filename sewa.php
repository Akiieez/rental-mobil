<?php
include 'config.php';

// Pastikan ID mobil dikirim via URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>alert('ID Mobil tidak ditemukan!'); window.location='index.php';</script>";
    exit;
}

$id_mobil = (int) $_GET['id']; // Pastikan ID adalah angka

// Ambil data mobil dari database
$result = $conn->query("SELECT * FROM cars WHERE id = $id_mobil");
$mobil = $result->fetch_assoc();

// Jika mobil tidak ditemukan atau statusnya sudah disewa, kembalikan ke index.php
if (!$mobil) {
    echo "<script>alert('Mobil tidak ditemukan di database!'); window.location='index.php';</script>";
    exit;
} elseif ($mobil['status'] == 'Disewa') {
    echo "<script>alert('Mobil ini sudah disewa! Pilih mobil lain.'); window.location='index.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sewa Mobil - <?= $mobil['nama_mobil']; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .container { max-width: 600px; margin-top: 50px; }
        .card img { width: 100%; height: 250px; object-fit: cover; border-radius: 10px; }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="index.php">Rental Mobil</a>
        </div>
    </nav>

    <!-- Container -->
    <div class="container">
        <div class="card shadow-sm p-4">
            <h3 class="text-center mb-4">Form Penyewaan</h3>

            <!-- Detail Mobil -->
            <div class="text-center">
                <img src="car<?= $mobil['id']; ?>.jpg" alt="<?= $mobil['nama_mobil']; ?>" class="img-fluid">
            </div>
            <h4 class="text-center mt-3"><?= $mobil['nama_mobil']; ?></h4>
            <p class="text-center text-muted">Harga: <strong>Rp <?= number_format($mobil['harga_per_hari'], 0, ',', '.'); ?> / hari</strong></p>

            <!-- Form Sewa -->
            <form action="proses_sewa.php" method="POST">
                <input type="hidden" name="id_mobil" value="<?= $mobil['id']; ?>">

                <div class="mb-3">
                    <label class="form-label">Nama Penyewa:</label>
                    <input type="text" name="nama_penyewa" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Mulai:</label>
                    <input type="date" name="tanggal_mulai" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Selesai:</label>
                    <input type="date" name="tanggal_selesai" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Sewa Mobil</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center py-3 mt-4">
        <p>&copy; 2025 Rental Mobil - All Rights Reserved by @Akiieez_ </p>
    </footer>

</body>
</html>
