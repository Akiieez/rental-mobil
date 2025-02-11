<?php
include 'config.php';

// Ambil mobil yang tersedia dari database
$query = "SELECT * FROM cars WHERE status = 'Tersedia'";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Mobil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Rental Mobil</h1>
    <nav>
        <a href="index.php">Beranda</a>
        <a href="login_admin.php">Login Admin</a>
    </nav>
</header>

<main>
    <h2>Daftar Mobil Tersedia</h2>
    <div class="car-container">
        <?php
        if ($result->num_rows > 0) {
            while ($car = $result->fetch_assoc()) {
                // Cek apakah gambar ada di database, jika tidak gunakan default.jpg
                $gambar = !empty($car['gambar']) ? $car['gambar'] : 'default.jpg';

                echo "<div class='car-item'>";
                echo "<img src='images/" . htmlspecialchars($gambar) . "' alt='" . htmlspecialchars($car['nama_mobil']) . "' onerror=\"this.onerror=null; this.src='images/default.jpg';\">";
                echo "<h3>" . htmlspecialchars($car['nama_mobil']) . "</h3>";
                echo "<p>Plat Nomor: " . htmlspecialchars($car['plat_nomor']) . "</p>";
                echo "<p>Harga per Hari: Rp" . number_format($car['harga_per_hari'], 0, ',', '.') . "</p>";
                echo "<a href='sewa.php?id=" . $car['id'] . "' class='btn'>Sewa Sekarang</a>";
                echo "</div>";
            }
        } else {
            echo "<p>Tidak ada mobil yang tersedia saat ini.</p>";
        }
        ?>
    </div>
</main>

<footer>
    <p>&copy; 2025 Rental Mobil - All Rights Reserved by @Akiieez_</p>
</footer>

</body>
</html>
