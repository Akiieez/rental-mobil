<?php
include 'config.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>alert('ID penyewaan tidak ditemukan!'); window.location='admin.php';</script>";
    exit;
}

$id_rental = (int) $_GET['id'];

// Ambil id mobil dari penyewaan
$result = $conn->query("SELECT id_mobil FROM rentals WHERE id = $id_rental");
$rental = $result->fetch_assoc();

if (!$rental) {
    echo "<script>alert('Data penyewaan tidak ditemukan!'); window.location='admin.php';</script>";
    exit;
}

$id_mobil = $rental['id_mobil'];

// Update status penyewaan jadi "Dikembalikan"
$conn->query("UPDATE rentals SET status = 'Dikembalikan' WHERE id = $id_rental");

// Ubah status mobil jadi "Tersedia"
$conn->query("UPDATE cars SET status = 'Tersedia' WHERE id = $id_mobil");

echo "<script>alert('Mobil telah dikembalikan!'); window.location='admin.php';</script>";
exit;
?>
