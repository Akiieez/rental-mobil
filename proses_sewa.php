<?php
include 'config.php'; // Pastikan koneksi ke database sudah benar

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_mobil = $_POST['id_mobil'];
    $nama_penyewa = $_POST['nama_penyewa'];
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_selesai = $_POST['tanggal_selesai'];

    // Validasi tanggal
    if ($tanggal_mulai > $tanggal_selesai) {
        echo "<script>alert('Tanggal selesai harus setelah tanggal mulai!'); window.history.back();</script>";
        exit;
    }

    // Ambil harga per hari dari database
    $result = $conn->query("SELECT harga_per_hari FROM cars WHERE id = $id_mobil");
    $mobil = $result->fetch_assoc();
    $harga_per_hari = $mobil['harga_per_hari'];

    // Hitung total harga berdasarkan selisih hari
    $selisih_hari = (strtotime($tanggal_selesai) - strtotime($tanggal_mulai)) / (60 * 60 * 24);
    $total_harga = $harga_per_hari * ($selisih_hari + 1);

    // Simpan data penyewaan ke database
    $query = "INSERT INTO rentals (id_mobil, nama_penyewa, tanggal_mulai, tanggal_selesai, total_harga) 
              VALUES ('$id_mobil', '$nama_penyewa', '$tanggal_mulai', '$tanggal_selesai', '$total_harga')";
    if ($conn->query($query) === TRUE) {
        // Update status mobil menjadi 'Disewa'
        $conn->query("UPDATE cars SET status = 'Disewa' WHERE id = $id_mobil");

        // Redirect kembali ke index.php setelah sukses
        echo "<script>alert('Penyewaan berhasil!'); window.location='index.php';</script>";
        exit;
    } else {
        echo "<script>alert('Terjadi kesalahan!'); window.history.back();</script>";
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}
?>
