<?php 
$hostname = "localhost";  // Menyimpan nama host database
$username = "root";       // Menyimpan nama pengguna untuk koneksi database
$password = "";           // Menyimpan kata sandi untuk koneksi database
$database = "jwd_wisata"; // Menyimpan nama database yang akan digunakan

// Membuat koneksi ke database
$conn = mysqli_connect($hostname, $username, $password, $database);

// Cek koneksi
if (!$conn) {
    // Jika koneksi gagal, tampilkan pesan error
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
