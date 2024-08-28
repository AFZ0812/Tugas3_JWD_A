<?php
include_once("connection.php");

if (isset($_GET['id_daftar_pesanan'])) {
    $id_daftar_pesanan = intval($_GET['id_daftar_pesanan']);

    // Menggunakan prepared statement untuk menghindari SQL Injection
    $stmt = $conn->prepare("DELETE FROM daftar_pesanan WHERE id_daftar_pesanan = ?");
    $stmt->bind_param("i", $id_daftar_pesanan);

    if ($stmt->execute()) {
        header("Location: list_pemesanan.php");
        exit(); // Tambahkan exit untuk menghentikan eksekusi skrip setelah header
    } else {
        echo "Gagal menghapus data pesanan.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "ID pesanan tidak valid.";
}
?>
