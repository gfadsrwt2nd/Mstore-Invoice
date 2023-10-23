<?php
include 'header_invoice.php';
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mstoreinvoice";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET['invoice']) && !empty($_GET['invoice'])) {
    $invoice_id = $_GET['invoice'];

    // Query SQL untuk mengambil data invoice berdasarkan ID
    $sql = "SELECT * FROM invoice WHERE kode_invoice = ?";

    // Persiapkan prepared statement
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Ikat parameter dan jalankan prepared statement
        $stmt->bind_param("s", $invoice_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            // Form untuk mengedit invoice
            echo '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta property="og:title" content="www.mstoregs.com" />
                <meta property="og:type" content="website" />
                <meta property="og:image" content="https://i.ibb.co/wZqZjBN/20230929-192921.png" />
                <meta property="og:url" content="https://mstoregs.com" />
                <meta property="og:description" content="Mstore Gading Serpong | Mstore Group" />
                <title>Edit Invoice</title>
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

            /* CSS untuk label */
            label {
                font-weight: bold; /* Membuat label teks menjadi tebal */
                display: block; /* Meletakkan label dalam baris terpisah */
                margin-top: 10px; /* Memberi jarak atas antara setiap label */
            }

            /* CSS untuk input tanggal */
            input[type="date"] {
                padding: 5px;
                border: 1px solid #ccc;
                border-radius: 5px;
                width: 100%; /* Mengisi lebar penuh kontainer */
            }

            /* CSS untuk textarea */
            textarea {
                padding: 5px;
                border: 1px solid #ccc;
                border-radius: 5px;
                width: 100%; /* Mengisi lebar penuh kontainer */
                height: 100px; /* Tinggi teks area */
            }

            </style>
            <body>
                <h1>Edit Invoice</h1>
                <form method="post" action="update.php">
                    <input type="hidden" name="id" value="' . $row["kode_invoice"] . '">
                    <label for="nama">Nama:</label>
                    <input type="text" name="nama" value="' . $row["nama"] . '"><br>

                    <label for="nomor_telepon">Nomor Telepon:</label>
                    <input type="text" name="nomor_telepon" value="' . $row["nomor_telepon"] . '"><br>


                    <label for="tanggal_diterima">Tanggal Diterima:</label>
                    <input type="date" name="tanggal_diterima" value="' . $row["tanggal_diterima"] . '"><br>

                    <label for="nama_barang">Nama Barang:</label>
                    <input type="text" name="nama_barang" value="' . $row["nama_barang"] . '"><br>

                    <label for="model">Model:</label>
                    <input type="text" name="model" value="' . $row["model"] . '"><br>

                    <label for="serial_number">Serial Number:</label>
                    <input type="text" name="serial_number" value="' . $row["serial_number"] . '"><br>

                    <label for="keluhan">Keluhan:</label>
                    <textarea name="keluhan">' . $row["keluhan"] . '</textarea><br>

                    <label for="spesifikasi">Spesifikasi:</label>
                    <textarea name="spesifikasi">' . $row["spesifikasi"] . '</textarea><br>

                    <label for="kelengkapan">Kelengkapan:</label>
                    <textarea name="kelengkapan">' . $row["kelengkapan"] . '</textarea><br>

                    <label for="penawaran">Penawaran:</label>
                    <textarea name="penawaran">' . $row["penawaran"] . '</textarea><br>

                    <label for="keterangan">Keterangan:</label>
                    <textarea name="keterangan">' . $row["keterangan"] . '</textarea><br>

                    <input type="submit" value="Simpan Perubahan">
                </form>
            </body>
            </html>';
        } else {
            echo "Invoice tidak ditemukan.";
        }
        $stmt->close();
    } else {
        echo "Terjadi kesalahan dalam persiapan prepared statement.";
    }
} else {
    echo "ID Invoice tidak valid.";
}

$conn->close();
?>
