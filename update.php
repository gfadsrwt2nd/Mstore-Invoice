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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pastikan semua input data yang diterima valid
    $kode_invoice = $_POST["id"];
    $nama = $_POST["nama"];
    $nomor_telepon = $_POST["nomor_telepon"];
    $tanggal_diterima = $_POST["tanggal_diterima"];
    $nama_barang = $_POST["nama_barang"];
    $model = $_POST["model"];
    $serial_number = $_POST["serial_number"];
    $keluhan = $_POST["keluhan"];
    $spesifikasi = $_POST["spesifikasi"];
    $kelengkapan = $_POST["kelengkapan"];
    $penawaran = $_POST["penawaran"];
    $keterangan = $_POST["keterangan"];

    // Query SQL untuk melakukan pembaruan data invoice
    $sql = "UPDATE invoice SET 
            Nama = ?,
            Nomor_Telepon = ?,
            Tanggal_Diterima = ?,
            Nama_Barang = ?,
            Model = ?,
            Serial_Number = ?,
            Keluhan = ?,
            Spesifikasi = ?,
            Kelengkapan = ?,
            Penawaran = ?,
            Keterangan = ?
            WHERE kode_invoice = ?";

    // Persiapkan prepared statement
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Ikat parameter dan jalankan prepared statement
        $stmt->bind_param("ssssssssssss", $nama, $nomor_telepon, $tanggal_diterima, $nama_barang, $model, $serial_number, $keluhan, $spesifikasi, $kelengkapan, $penawaran, $keterangan, $kode_invoice);

        if ($stmt->execute()) {
            echo "Data invoice berhasil diperbarui.";
        } else {
            echo "Gagal memperbarui data invoice: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Terjadi kesalahan dalam persiapan prepared statement.";
    }
}

$conn->close();
?>
