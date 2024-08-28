<?php 
include_once("connection.php"); // Memanggil file connection.php untuk menghubungkan ke database
include_once("header.php"); // Memanggil file header.php yang berisi bagian atas halaman
?> 

<div class="list-container"> 
  <h2>Daftar Pesanan</h2> <!-- Judul halaman daftar pesanan -->
  <div class="table-container"> 
    <table> 
      <thead> 
        <tr> 
          <th>No</th> <!-- Kolom nomor urut -->
          <th>Paket Wisata</th> <!-- Kolom nama paket wisata -->
          <th>Nama Pemesan</th> <!-- Kolom nama pemesan -->
          <th>Telepon</th> <!-- Kolom nomor telepon -->
          <th>Jumlah Peserta</th> <!-- Kolom jumlah peserta -->
          <th>Jumlah Hari</th> <!-- Kolom jumlah hari -->
          <th>Akomodasi</th> <!-- Kolom akomodasi -->
          <th>Transportasi</th> <!-- Kolom transportasi -->
          <th>Service / Makanan</th> <!-- Kolom service/makanan -->
          <th>Harga Paket</th> <!-- Kolom harga paket -->
          <th>Total Tagihan</th> <!-- Kolom total tagihan -->
          <th>Aksi</th> <!-- Kolom aksi untuk edit dan delete -->
        </tr> 
      </thead> 
      <tbody> 
        <?php 
        // Query untuk mengambil data pesanan dari database dengan join tabel paket_wisata
        $sql = "SELECT dp.*, pw.nama_paket FROM daftar_pesanan dp JOIN paket_wisata pw ON dp.id_paket_wisata = pw.id_paket_wisata"; 
        $results = mysqli_query($conn, $sql);
        
        $i = 1; // Inisialisasi nomor urut
        // Loop untuk menampilkan setiap data pesanan
        while($data_pesanan = mysqli_fetch_array($results)) { 
        ?> 
        <tr> 
          <td><?php echo $i;?></td> <!-- Menampilkan nomor urut -->
          <td><?php echo $data_pesanan['nama_paket'];?></td> <!-- Menampilkan nama paket wisata -->
          <td><?php echo $data_pesanan['nama_pemesan'];?></td> <!-- Menampilkan nama pemesan -->
          <td><?php echo $data_pesanan['no_tlp'];?></td> <!-- Menampilkan nomor telepon -->
          <td><?php echo $data_pesanan['jumlah_peserta'];?></td> <!-- Menampilkan jumlah peserta -->
          <td><?php echo $data_pesanan['jumlah_hari'];?></td> <!-- Menampilkan jumlah hari -->
          <td><?php echo $data_pesanan['akomodasi'];?></td> <!-- Menampilkan akomodasi -->
          <td><?php echo $data_pesanan['transportasi'];?></td> <!-- Menampilkan transportasi -->
          <td><?php echo $data_pesanan['makanan'];?></td> <!-- Menampilkan service/makanan -->
          <td><?php echo number_format($data_pesanan['harga_paket'], 0, ',', '.');?></td> <!-- Menampilkan harga paket dengan format ribuan -->
          <td><?php echo number_format($data_pesanan['total_tagihan'], 0, ',', '.');?></td> <!-- Menampilkan total tagihan dengan format ribuan -->
          <td> 
            <div class="btn-link"> 
                <!-- Link untuk mengedit pesanan -->
                <a href="form_edit.php?id_daftar_pesanan=<?php echo $data_pesanan['id_daftar_pesanan']; ?>">Edit</a>
                
                <!-- Button untuk menghapus pesanan dengan konfirmasi -->
                <button class="btn-hapus" onclick="konfirmasiPenghapusan(<?php echo htmlspecialchars($data_pesanan['id_daftar_pesanan']); ?>">Hapus</button>
            </div>
        </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script type="text/javascript">
    function konfirmasiPenghapusan(id_daftar_pesanan) {
        var konfirmasi = confirm("Apakah yakin akan menghapus data?");
        
        if (konfirmasi) {
            // Mengarahkan ke halaman PHP untuk memproses penghapusan
            window.location.href = "proses_hapus.php?id_daftar_pesanan=" + id_daftar_pesanan;
        }
    }
</script>

<?php
include_once("footer.php");
$conn->close();
?>
