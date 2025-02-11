<?php
$host = "localhost";  // Pastikan ini sesuai dengan server
$user = "root";       // Username default di XAMPP adalah 'root'
$pass = "";           // Kosongkan jika tanpa password
$db = "rental_mobil"; // Pastikan nama database benar

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>