$(document).ready(function() {
    // Fungsi untuk menghitung harga paket dan jumlah tagihan
    function perhitungan() {
        var harga_penginapan = 0;
        var harga_transportasi = 0;
        var harga_makan = 0;

        $("#nama_paket").on("change", function () { 
            var idPaket = $(this).val(); 
         
            if (idPaket) { 
              window.location.href = 
        "form_pendaftaran.php?id_paket_wisata=" + idPaket; 
            } 
          }); 


        // Mengecek apakah checkbox penginapan dicentang
        if ($("#layanan_penginapan").is(":checked")) {
            harga_penginapan = $("#layanan_penginapan").val();
        }

        // Mengecek apakah checkbox transportasi dicentang
        if ($("#layanan_transportasi").is(":checked")) {
            harga_transportasi = $("#layanan_transportasi").val();
        }

        // Mengecek apakah checkbox makan dicentang
        if ($("#layanan_makan").is(":checked")) {
            harga_makan = $("#layanan_makan").val();
        }

        var jumlah_hari = $("#jumlah_hari").val(); // Mengambil nilai jumlah hari
        var jumlah_peserta = $("#jumlah_peserta").val(); // Mengambil nilai jumlah peserta

        // Validasi jumlah peserta
        if (jumlah_peserta < 1) {
            alert("Jumlah peserta minimal 1"); // Menampilkan pesan jika jumlah peserta kurang dari 1
            $("#jumlah_peserta").val("1"); // Mengatur nilai jumlah peserta menjadi 1
            jumlah_peserta = $("#jumlah_peserta").val(); // Memperbarui nilai jumlah peserta
        }

        // Validasi jumlah hari
        if (jumlah_hari < 1) {
            alert("Jumlah hari minimal 1"); // Menampilkan pesan jika jumlah hari kurang dari 1
            $("#jumlah_hari").val("1"); // Mengatur nilai jumlah hari menjadi 1
            jumlah_hari = $("#jumlah_hari").val(); // Memperbarui nilai jumlah hari
        }

        // Memastikan paket transportasi dicentang jika harga transportasi 0
        if (parseInt(harga_transportasi) == 0) {
            alert("Wajib menyertakan Paket Transportasi"); // Menampilkan pesan jika harga transportasi 0
            $("#layanan_transportasi").prop("checked", true); // Menyertakan paket transportasi secara otomatis
            harga_transportasi = $("#layanan_transportasi").val(); // Mengambil nilai harga transportasi yang baru
        }

        // Menghitung harga paket
        var harga_paket = 
            parseInt(harga_penginapan) + 
            parseInt(harga_transportasi) + 
            parseInt(harga_makan);

        // Memformat harga paket dengan pemisah ribuan sesuai lokal "de-DE"
        var harga_paket_formated = harga_paket.toLocaleString("de-DE");

        // Menghitung jumlah tagihan
        var jumlah_tagihan = 
            harga_paket * parseInt(jumlah_hari) * 
            parseInt(jumlah_peserta);

        // Memformat jumlah tagihan dengan pemisah ribuan sesuai lokal "de-DE"
        var jumlah_tagihan_formated = 
            jumlah_tagihan.toLocaleString("de-DE");

        // Menampilkan hasil perhitungan pada form
        $("#harga_paket").val(harga_paket_formated);
        $("#jumlah_tagihan").val(jumlah_tagihan_formated);
    }

    // Mengubah URL ketika paket wisata dipilih dari dropdown
    $("#nama_paket").on("change", function () {
        var idPaket = $(this).val(); // Mengambil ID paket dari dropdown

        if (idPaket) {
            window.location.href = "form_pendaftaran.php?id_paket_wisata=" + idPaket; // Mengarahkan ke halaman pendaftaran dengan parameter ID paket
        }
    });

    // Menangani klik tombol hitung
    $("#btn-hitung").on("click", function (event) {
        event.preventDefault(); // Mencegah perilaku default dari tombol (misalnya, mengirim form)
        perhitungan(); // Memanggil fungsi perhitungan
    });

    // Menangani perubahan jumlah peserta
    $("#jumlah_peserta").on("change", function () {
        perhitungan(); // Memanggil fungsi perhitungan saat jumlah peserta berubah
    });

    // Menangani perubahan jumlah hari
    $("#jumlah_hari").on("change", function () {
        perhitungan(); // Memanggil fungsi perhitungan saat jumlah hari berubah
    });

    // Menangani perubahan checkbox transportasi
    $("#layanan_transportasi").on("change", function () {
        perhitungan(); // Memanggil fungsi perhitungan saat checkbox transportasi berubah
    });

    // Menangani perubahan checkbox penginapan
    $("#layanan_penginapan").on("change", function () {
        perhitungan(); // Memanggil fungsi perhitungan saat checkbox penginapan berubah
    });

    // Menangani perubahan checkbox makan
    $("#layanan_makan").on("change", function () {
        perhitungan(); // Memanggil fungsi perhitungan saat checkbox makan berubah
    });

    // Menangani klik tombol reset
    $("#btn-reset").on("click", function (event) {
        event.preventDefault(); // Mencegah perilaku default dari tombol (misalnya, mengirim form)
        // Mengatur ulang semua field pada form
        $("#harga_paket").val(""); // Menghapus nilai harga paket
        $("#jumlah_tagihan").val(""); // Menghapus nilai jumlah tagihan
        $("#nama_pemesan").val(""); // Menghapus nilai nama pemesan
        $("#tgl_pesan").val(""); // Menghapus nilai tanggal pesan
        $("#no_tlp").val(""); // Menghapus nilai nomor telepon
        $("#jumlah_hari").val("1"); // Mengatur jumlah hari ke 1
        $("#jumlah_peserta").val("1"); // Mengatur jumlah peserta ke 1
        $("#layanan_makan").prop("checked", true); // Mengatur checkbox makan menjadi dicentang
        $("#layanan_penginapan").prop("checked", true); // Mengatur checkbox penginapan menjadi dicentang
        $("#layanan_transportasi").prop("checked", true); // Mengatur checkbox transportasi menjadi dicentang
    });
    
});
