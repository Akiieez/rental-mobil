<?php
session_start();
include 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Cek admin di database
$result = $conn->query("SELECT * FROM admin WHERE username = '$username'");
$admin = $result->fetch_assoc();

if ($admin && password_verify($password, $admin['password'])) { 
    $_SESSION['admin'] = true;
    echo "<script>alert('Login berhasil!'); window.location='admin.php';</script>";
} else {
    echo "<script>alert('Username atau password salah!'); window.location='login_admin.php';</script>";
}
?>
