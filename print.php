<?php
// Menerima ID kode invoice dari parameter URL
if (isset($_GET['invoice']) && !empty($_GET['invoice'])) {
    $kode_invoice = $_GET['invoice'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mstoreinvoice";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Menggunakan prepared statement
    $sql = "SELECT * FROM invoice WHERE kode_invoice = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $kode_invoice);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Memulai HTML di sini
        echo "<!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <meta property='og:title' content='www.mstoregs.com' />
                <meta property='og:type' content='website' />
                <meta property='og:image' content='https://i.ibb.co/wZqZjBN/20230929-192921.png' />
                <meta property='og:url' content='https://mstoregs.com' />
                <meta property='og:description' content='Mstore Gading Serpong | Mstore Group' />
                <title>Cetak Tanda Terima</title>
                <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
                <link rel='stylesheet' type='text/css' href='css/style.css'>
                <style type='text/css'>
                    /* Gaya tampilan cetak */
                    body {
                        font-family: Arial, sans-serif;
                    }
                    .header {
                        text-align: center;
                        margin: 10px;
                    }
                    .content {
                        margin: 10px;
                    }
                    .logo {
                        max-width: 100%;
                        height: auto;
                    }
                    label {
                        display: inline-block;
                        width: 200px; /* Sesuaikan lebar sesuai kebutuhan Anda */
                        text-align: left;
                        margin-right: 10px;
                    }
                    nama-barang {
                        margin-left:20px;
                    }
                    model {
                        margin-top:0;
                        margin-left:75px;
                    }
                    serial {
                        margin-left:16px;
                    }
                    keluhan {
                        margin-left:61px;
                    }
                    spesifikasi {
                        margin-left:44px;
                    }
                    kelengkapan {
                        margin-left:27px;
                    }
                    penawaran {
                        margin-left:40px;
                    }
                    keterangan {
                        margin-left:39px;
                    }
                    small-align {
                        font-size:15px;
                    }
                    .footer {
                        margin-top:1px;
                    }
                    .tanda_tangan{
                        margin-top:1px;
                    }
                    .note {
                        font-size:13px;
                    }
                </style>
            </head>
            <body>";
            
        // Gunakan satu loop untuk menampilkan semua data
        while ($row = $result->fetch_assoc()) {
            echo "<div class='header'>";
            echo "<center>";
            echo "<img class='logo' src='img/logo.png' alt='Logo'>";
            echo "<h2>Tanda Terima Service</h2>";
            echo "<hr>";
            echo "</center>";
            echo "<p style='text-align:left;'>Nomor : " . $row["kode_invoice"] . "</p>";
            echo "<p style='text-align: right; margin-right: 10px;'>PERHATIAN !!!<br>";
            echo "Biaya Pemeriksaan/Pembatalan dikenakan Rp.100.000,-<br>";
            echo "Kerusakan Program/terkena virus tidak bergaransi";
            echo "</p>";
            echo "<p style='text-align:left;'>Nama : " . $row["nama"] . "<br>";
            echo "Nomor Telepon: " . $row["nomor_telepon"] . "<br>";
            echo "Tanggal : " . $row["tanggal_diterima"] . "</p>";
            echo "</div>";

            // Tampilkan data lainnya di sini
            echo "<div class='content'>";
            echo "<div class='cetak'>";
            echo "Nama Barang " . "<nama-barang>:</nama-barang>" . $row["nama_barang"] . "</mst><br><br>";
            echo "Model " . "<model>:</model>" . $row["model"] . "</mst><br><br>";
            echo "Serial Number " . "<serial>:</serial>" . $row["serial_number"] . "</mst><br><br>";
            echo "Keluhan " . "<keluhan>:</keluhan>" . $row["keluhan"] . "</mst><br><br>";
            echo "Spesifikasi " . "<spesifikasi>:</spesifikasi>" . $row["spesifikasi"] . "</mst><br><br>";
            echo "Kelengkapan " . "<kelengkapan>:</kelengkapan>" . $row["kelengkapan"] . "</mst><br><br>";
            echo "Penawaran " . "<penawaran>:</penawaran>" . $row["penawaran"] . "</mst><br><br>";
            echo "Keterangan " . "<keterangan>:</keterangan>" . $row["keterangan"] . "</mst><br><br>";
            echo "

            <div class='footer'>
                <p class='note'>Jika diterima dalam keadaan unit mati/tidak masuk OS, belum bisa melakukan pengecekan semua fitur (wifi, sound, kamera, keyboard, dll)</p>
            </div>

            <div class='tanda_tangan'>
                <div class='ttd_pelanggan'>
                    <p>Yang Menyerahkan<br>
                    Tanda Tangan Pelanggan:<br><br> ____________________________</p>
                </div>
                <div class='ttd_penerima'>
                    <p>Penerima<br>
                    Tanda Tangan Penerima:<br><br> ____________________________</p>
                </div>
            </div>

            <div class='catatan'>
                <small-align>
                <small>NB:</small><br>
                <small>1. Kehilangan/kerusakan barang karena kebakaran, kerusuhan, penjarahan, huru-hara, bencana alam di tempat barang diservice (di tempat kami maupun di cabang/agen supplier) tidak menjadi tanggung jawab kami.</small><br>
                <small>2. Barang yang tidak diambil dalam waktu 1 (satu) bulan bukan menjadi tanggung jawab kami lagi.</small><br>
                <small>3. Catatan khusus untuk notebook/PC, pemilik diharuskan membackup data/software terlebih dahulu sebelum masuk ke workshop, kami tidak bertanggung jawab atas klaim kerusakan, kehilangan data/software.</small><br>
                <small>4. Jika tanda terima ini hilang, maka pemilik harus menunjukkan kwitansi pembelian dan dikenai biaya administrasi sebesar 25.000.</small>
            </small-align>
            </div>
            ";
            echo "</div>";
        }
        // Selesai HTML di sini
        echo "</body>
            </html>";
    } else {
        echo "Tanda terima tidak ditemukan.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "ID kode invoice tidak valid.";
}

?>
