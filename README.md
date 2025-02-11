# 🚗 Rental Mobil Berbasis Web by @Akiieez_

Sebuah sistem rental mobil berbasis web yang memungkinkan pelanggan untuk menyewa mobil dan admin untuk mengelola penyewaan.

## 📌 Fitur
- **Pelanggan**:
  - Melihat daftar mobil yang tersedia
  - Menyewa mobil
- **Admin**:
  - Login untuk mengelola penyewaan
  - Mengkonfirmasi pengembalian mobil

## 🛠️ Teknologi yang Digunakan
- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP (Native)
- **Database**: MySQL
- **Server**: Apache (XAMPP)

## 🚀 Cara Menjalankan Proyek di Lokal
### 
1️⃣ Clone Repository  

git clone https://github.com/Akiieez/rental-mobil.git

2️⃣ Pindah ke Folder Proyek

cd rental-mobil

3️⃣ Jalankan XAMPP

Aktifkan Apache dan MySQL di XAMPP Control Panel

4️⃣ Buat Database

Buka http://localhost/phpmyadmin/
Buat database baru dengan nama rental_mobil
atau Import file rental_mobil.sql yang ada di folder proyek

5️⃣ Konfigurasi Database
Edit file config.php dan sesuaikan:

$host = "localhost";
$user = "root";  // Ganti jika ada password MySQL
$pass = "";       // Kosongkan jika tidak ada password
$db   = "rental_mobil";
$conn = mysqli_connect($host, $user, $pass, $db);

6️⃣ Jalankan Proyek
Buka browser dan akses:
http://localhost/rental-mobil/index.php

🔑 Login Admin
Gunakan akun admin berikut untuk login:

Username: admin
Password: admin123

📸 Screenshot

![image](https://github.com/user-attachments/assets/c07c68d0-08c7-42f4-ada6-0d9107ef904a)

🤝 Kontribusi
Pull request dipersilakan! Pastikan untuk membuat issue terlebih dahulu sebelum mengerjakan perubahan besar.

📜 Lisensi
Proyek ini menggunakan lisensi MIT. Silakan gunakan dan modifikasi sesuai kebutuhan.
