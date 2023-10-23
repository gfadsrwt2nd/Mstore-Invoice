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
    <title>Mstore Apps</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
        <style type="text/css">
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

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .logo {
            max-width: 100%; /* Maksimum lebar gambar adalah 100% lebar elemen yang mengandungnya */
            height: auto; /* Menjaga perbandingan aspek gambar saat mengubah lebar */
        }
        /* CSS khusus untuk tampilan cetak */
        @media print {
            /* Sembunyikan elemen-elemen yang tidak perlu dicetak */
            body * {
                isibility: hidden;
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

        /* CSS untuk form pencarian */
        .pencarian {
            float: left; /* Mengatur posisi di kanan */
            margin-right: 10px; /* Margin kanan untuk jarak dari tepi kanan */
        }

        .pencarian form {
            display: inline-block; /* Mengatur form agar tampil secara horizontal */
        }

        .pencarian input[type="text"] {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .pencarian button {
            padding: 5px 10px;
            margin-top: 5px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Hover state untuk tombol */
        .pencarian button:hover {
            background-color: #0056b3;
        }

        </style>
<body>
    <div class="navbar">
        <div class="menu">
            <a href="dashboard.php"><img src="img/home.png" height="28">Beranda</a>
            <a href="total_invoice.php"><img src="img/grid.png" height="25">Total Invoice</a>
            <a href="logout.php"><img src="img/logout.png" height="30">Keluar</a>
        </div>
    </div>

    <div class="header">
        <center>
            <img class="logo" src="img/logo.png" alt="Logo">
        </center>
    </div>
    <h1>Total Invoice</h1>
    <a href="dashboard.php" class="btn btn-outline-success"><img src="img/add.png" height="34">Tambah</a><br>
    <div class="pencarian">
        <form method="GET" action="proses_pencarian.php">
            <input type="text" name="cari" placeholder="Masukkan kata kunci pencarian">
            <button type="submit"><img src="img/search.png" height="30">Cari</button>
        </form>
    </div>


    <?php
    // Koneksi ke database (gantilah dengan informasi koneksi Anda)
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

    // Query SQL untuk mengambil data invoice dari database (gantilah "nama_tabel" sesuai dengan nama tabel Anda)
    $sql = "SELECT kode_invoice, Nama, Nomor_Telepon, Tanggal_Diterima, Nama_Barang, Model, Serial_Number, Keluhan, Spesifikasi, Kelengkapan, Penawaran, Keterangan FROM invoice";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<div class='invoice'>";
        echo "<table>";
        echo "<tr>
        <th>Kode Invoice</th>
        <th>Nama</th>
        <th>Nomor Telepon</th>
        <th>Tanggal Diterima</th>
        <th>Nama Barang</th>
        <th>Model</th>
        <th>Serial Number</th>
        <th>Keluhan</th>
        <th>Spesifikasi</th>
        <th>Kelengkapan</th>
        <th>Penawaran</th>
        <th>Keterangan</th>
        <th>Aksi</th>
        </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["kode_invoice"] . "</td>";
            echo "<td>" . $row["Nama"] . "</td>";
            echo "<td>" . $row["Nomor_Telepon"] . "</td>";
            echo "<td>" . $row["Tanggal_Diterima"] . "</td>";
            echo "<td>" . $row["Nama_Barang"] . "</td>";
            echo "<td>" . $row["Model"] . "</td>";
            echo "<td>" . $row["Serial_Number"] . "</td>";
            echo "<td>" . $row["Keluhan"] . "</td>";
            echo "<td>" . $row["Spesifikasi"] . "</td>";
            echo "<td>" . $row["Kelengkapan"] . "</td>";
            echo "<td>" . $row["Penawaran"] . "</td>";
            echo "<td>" . $row["Keterangan"] . "</td>";
            echo "</div>";
            echo '<td>
            <a href="edit_invoice.php?invoice=' . $row["kode_invoice"] . '" class="btn btn-outline-primary"><img src="img/compose.png" height="30">Edit</a>
 | <button class="btn btn-outline-success cetakButton" data-invoice="' . $row["kode_invoice"] . '"><img src="img/printing.png" height="30">Cetak</button>
            </td>';
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Tidak ada invoice yang ditemukan.";
    }

    $conn->close();
    ?>

<script>
document.querySelectorAll('.cetakButton').forEach(function(button) {
    button.addEventListener('click', function() {
        var invoiceCode = this.getAttribute('data-invoice');
        // Buat URL cetak berdasarkan kode invoice, misalnya: print.php?invoice=MSINV-001
        var printUrl = 'print.php?invoice=' + invoiceCode;
        
        // Buka halaman cetak dalam jendela baru
        var newWindow = window.open(printUrl, '_blank');
        
        // Periksa apakah jendela baru telah dimuat
        if (newWindow) {
            // Lakukan pencetakan halaman dalam jendela baru
            newWindow.print();
        } else {
            alert('Browser Anda memblokir popup. Mohon izinkan popup untuk mencetak.');
        }
    });
});

</script>

    <!-- Tambahkan tautan atau tombol lain sesuai kebutuhan Anda -->
</body>
</html>
