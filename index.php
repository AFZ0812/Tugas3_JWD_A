<?php 
include_once("header.php"); // Memanggil file header.php yang berisi bagian atas halaman dan koneksi ke database

// Fungsi untuk memeriksa apakah paket wisata dipilih
function selectedPaketWisata($val1, $val2) {
    return $val1 == $val2 ? "selected" : ""; // Mengembalikan "selected" jika nilai sama, digunakan untuk dropdown
}

// Mengambil semua data paket wisata
$sql = "SELECT * FROM paket_wisata"; // Query SQL untuk mengambil semua data dari tabel paket_wisata
$results = mysqli_query($conn, $sql); // Menjalankan query dan menyimpan hasilnya dalam variabel $results
?>

<div class="konten-pariwisata">
    <div class="info-container">
        <?php while ($data_paket = mysqli_fetch_array($results)) { ?>
            <!-- Loop untuk menampilkan setiap paket wisata -->
            <div class="paket-container">
                <img src="images/<?php echo $data_paket['img_paket']; ?>" alt="paket"/> <!-- Menampilkan gambar paket wisata -->
                <h3><?php echo $data_paket['nama_paket']; ?></h3> <!-- Menampilkan nama paket wisata -->
                <p><?php echo $data_paket['deskripsi_paket']; ?></p> <!-- Menampilkan deskripsi paket wisata -->
                <a href="form_pendaftaran.php?id_paket_wisata=<?php echo $data_paket['id_paket_wisata']; ?>">Daftar</a> <!-- Link untuk mendaftar paket wisata -->
            </div>
        <?php } ?>
    </div>

    <div class="promosi-container">
        <?php 
        // Mengambil video dari database, dibatasi 4 video
        $sql_videos = "SELECT * FROM paket_wisata LIMIT 4"; // Query SQL untuk mengambil 4 video dari tabel paket_wisata
        $results_video = mysqli_query($conn, $sql_videos); // Menjalankan query dan menyimpan hasilnya dalam variabel $results_video
        while ($data_video = mysqli_fetch_array($results_video)) { ?>
            <!-- Loop untuk menampilkan setiap video -->
            <div class="video-container">
                <h3><?php echo $data_video['nama_paket']; ?></h3> <!-- Menampilkan nama paket wisata yang terkait dengan video -->
                <?php echo $data_video['link_video']; ?> <!-- Menampilkan link atau embed video -->
            </div>
        <?php } ?>
    </div>
</div>
<!-- end konten-pariwisata -->

<?php 
include_once("footer.php"); // Memanggil file footer.php yang berisi bagian bawah halaman
?>
