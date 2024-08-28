<!-- header.php -->
<?php 
// Memanggil file connection.php untuk menghubungkan ke database
include_once("connection.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Menyeting charset menjadi UTF-8 untuk mendukung berbagai karakter -->
    <link rel="stylesheet" href="style.css"> <!-- Menyertakan file CSS untuk styling -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Mengatur viewport untuk tampilan responsif pada perangkat mobile -->
    <title>Wisata Alam</title> <!-- Menentukan judul halaman yang tampil di tab browser -->
</head>
<body>
    <div class="main-container"> <!-- Kontainer utama untuk seluruh konten halaman -->
        <div class="img-header"> <!-- Kontainer untuk gambar header -->
            <div class="brand-container"> <!-- Kontainer untuk branding atau informasi utama -->
                <h1>Objek Wisata Alam</h1> <!-- Judul utama halaman -->
                <h2>Di Sekitar Makassar Sulawesi Selatan</h2> <!-- Subjudul halaman -->
                <img src="images/logo_malino_kuning.png" alt=""> <!-- Logo atau gambar branding -->
            </div>
            <!-- end brand-container -->
            <img src="images/malino_camping_ground.jpg" alt="Camping"> <!-- Gambar untuk area camping -->
            <img src="images/malino_high_land.jpg" alt="Highland"> <!-- Gambar untuk highland -->
            <img src="images/malino_hutan_pinus.jpg" alt="Hutan Pinus"> <!-- Gambar untuk hutan pinus -->
            <img src="images/malino_kebun_bunga.jpg" alt="Kebun Bunga"> <!-- Gambar untuk kebun bunga -->
            <img src="images/malino_kebun_teh.jpg" alt="Kebun Teh"> <!-- Gambar untuk kebun teh -->
            <img src="images/malino_pool.jpg" alt="Kolam Renang"> <!-- Gambar untuk kolam renang -->
            <img src="images/malino_puncak.jpg" alt="Puncak"> <!-- Gambar untuk puncak -->
            <img src="images/malino_resto.jpg" alt="Restoran"> <!-- Gambar untuk restoran -->
            <img src="images/malino_sun_set.jpg" alt="Matahari Terbenam"> <!-- Gambar untuk matahari terbenam -->
            <img src="images/malino_water_fall.jpg" alt="Air Terjun"> <!-- Gambar untuk air terjun -->
        </div>
        <!-- end img-header -->

        <div class="menu-header"> <!-- Kontainer untuk menu navigasi header -->
            <a href="index.php">Beranda</a> <!-- Link ke halaman utama -->
            <a href="form_pendaftaran.php">Daftar Paket Wisata</a> <!-- Link ke halaman pendaftaran paket wisata -->
            <a href="list_pemesanan.php">Modifikasi Pesanan</a> <!-- Link ke halaman modifikasi pesanan -->
            <!-- end menu header -->
        </div>
