<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mstoreinvoice";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT kode_invoice, Nama, Nomor_Telepon, Tanggal_Diterima, Nama_Barang, Model, Serial_Number, Keluhan, Spesifikasi, Kelengkapan, Penawaran, Keterangan FROM invoice";

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="www.mstoregs.com" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://i.ibb.co/wZqZjBN/20230929-192921.png" />
    <meta property="og:url" content="https://mstoregs.com" />
    <meta property="og:description" content="Mstore Gading Serpong | Mstore Group" />
    <title>Cetak Invoice</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        .logo {
            max-width: 100%; /* Maksimum lebar gambar adalah 100% lebar elemen yang mengandungnya */
            height: auto; /* Menjaga perbandingan aspek gambar saat mengubah lebar */
        }
        /* CSS khusus untuk tampilan cetak */
        @media print {
            /* Sembunyikan elemen-elemen yang tidak perlu dicetak */
            body * {
                visibility: hidden;
            }
            .invoice, .invoice * {
                visibility: visible;
            }
            /* Gaya cetak */
            .header, .invoice {
                width: 100%;
                margin: 0;
                padding: 0;
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="menu">
            <a href="dashboard.php"><img src="img/home.png" height="28">Beranda</a>
            <a href="total_invoice.php"><img src="img/grid.png" height="25">Total Invoice</a>
            <a href="cetak_invoice.php"><img src="img/printing.png" height="30">Cetak Invoice</a>
            <a href="logout.php"><img src="img/logout.png" height="30">Keluar</a>
        </div>
    </div>

    <div class="header">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<center>";
            echo "<img class='logo' src='img/logo.png' alt='Logo'>";
            echo "<h2>Tanda Terima Service</h2>";
            echo "<hr>";
            echo "</center>";
            echo "<p>Nomor : " . $row["kode_invoice"] . "</p>";
            echo "<p style='text-align: right; margin-right: 10px;'>PERHATIAN !!!<br>";
            echo "Biaya Pemeriksaan/Pembatalan dikenakan Rp.100.000,-<br>";
            echo "Kerusakan Program/terkena virus tidak bergaransi";
            echo "</p>";
            echo "<p>Nama : " . $row["Nama"] . "</p>";
            echo "<p>Nomor Telepon: " . $row["Nomor_Telepon"] . "</p>";
            echo "<p>Tanggal : " . $row["Tanggal_Diterima"] . "</p>";
        }
    } else {
        echo "Tidak Ada Invoice ditemukan";
    }
    ?>
    </div>

    <div class="content">
    <?php
        if ($result->num_rows > 0) {
        // Mengatur ulang kursor ke awal hasil
        $result->data_seek(0);

        while ($row = $result->fetch_assoc()) {
            echo "<div class='cetak'>";
            echo "Nama Barang: <mst>" . $row["Nama_Barang"] . "<br><br>";
            echo "Model: <mst>" . $row["Model"] . "<br><br>";
            echo "Serial Number: <mst>" . $row["Serial_Number"] . "<br><br>";
            echo "Keluhan: <mst>" . $row["Keluhan"] . "<br><br>";
            echo "Spesifikasi: <mst>" . $row["Spesifikasi"] . "<br><br>";
            echo "Kelengkapan: <mst>" . $row["Kelengkapan"] . "<br><br>";
            echo "Penawaran: <mst>" . $row["Penawaran"] . "<br><br>";
            echo "Keterangan: <mst>" . $row["Keterangan"] . "<br><br>";
            echo "</div>";
        }
    } else {
        echo "Tidak ada invoice yang ditemukan.";
    }

    // Tutup koneksi ke database
    $conn->close();

    ?>
    <br>

    <div class="footer">
        <p>Jika diterima dalam keadaan unit mati/tidak masuk OS, belum bisa melakukan pengecekan semua fitur (wifi, sound, kamera, keyboard, dll)</p>
    </div>

    <div class="tanda_tangan">
        <div class="ttd_pelanggan">
            <p>Yang Menyerahkan</p>
            <p>Tanda Tangan Pelanggan:<br><br><br><br> ____________________________</p>
        </div>
        <div class="ttd_penerima">
            <p>Penerima</p>
            <p>Tanda Tangan Penerima:<br><br><br><br> ____________________________</p>
        </div>
    </div>

    <div class="catatan">
        <small-align>
        <small>NB:</small><br>
        <small>1. Kehilangan/kerusakan barang karena kebakaran, kerusuhan, penjarahan, huru-hara, bencana alam di tempat barang diservice (di tempat kami maupun di cabang/agen supplier) tidak menjadi tanggung jawab kami.</small><br>
        <small>2. Barang yang tidak diambil dalam waktu 1 (satu) bulan bukan menjadi tanggung jawab kami lagi.</small><br>
        <small>3. Catatan khusus untuk notebook/PC, pemilik diharuskan membackup data/software terlebih dahulu sebelum masuk ke workshop, kami tidak bertanggung jawab atas klaim kerusakan, kehilangan data/software.</small><br>
        <small>4. Jika tanda terima ini hilang, maka pemilik harus menunjukkan kwitansi pembelian dan dikenai biaya administrasi sebesar 25.000.</small>
        </small-align>
    </div>
</div>

    <script>
    // Mengambil kode_invoice dari PHP dan menyimpannya ke dalam variabel JavaScript
    var kodeInvoice = "<?php echo $row["kode_invoice"]; ?>";

    // Mengganti konten elemen dengan ID "nomor" dengan kode_invoice
    document.getElementById("nomor").textContent = kodeInvoice;
</script>

</body>
</html>