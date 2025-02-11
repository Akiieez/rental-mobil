<?php
include 'config.php';

$username = "admin";
$password = password_hash("admin123", PASSWORD_DEFAULT); // Enkripsi password

// Cek apakah admin sudah ada
$check = $conn->query("SELECT * FROM admin WHERE username = '$username'");
if ($check->num_rows == 0) {
    $conn->query("INSERT INTO admin (username, password) VALUES ('$username', '$password')");
    echo "Admin berhasil ditambahkan!";
} else {
    echo "Admin sudah ada!";
}
?>
