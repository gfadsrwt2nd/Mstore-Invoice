<?php
include "header.php";

function generateAndStoreInvoiceCode() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mstoreinvoice";

    // Buat koneksi ke database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Periksa koneksi database
    if ($conn->connect_error) {
        die("Koneksi database gagal: " . $conn->connect_error);
    }

    // Ambil nomor urut terakhir dari tabel invoice
    $sql = "SELECT MAX(id) AS max_id FROM invoice";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nextId = $row["max_id"] + 1;
    } else {
        $nextId = 1;
    }

    // Buat kode invoice
    $invoiceCode = "MSINV-" . str_pad($nextId, 4, "0", STR_PAD_LEFT);

    // Gunakan prepared statement untuk menyimpan kode invoice ke dalam database
    $insertSql = "INSERT INTO invoice (kode_invoice, nama, nomor_telepon, tanggal_diterima, nama_barang, model, serial_number, keluhan, spesifikasi, kelengkapan, penawaran, keterangan) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($insertSql);
    $stmt->bind_param("sssssssssssd", $invoiceCode, $nama, $nomor_telepon, $tanggal_diterima, $nama_barang, $model, $serial_number, $keluhan, $spesifikasi, $kelengkapan, $penawaran, $keterangan);

    $nama = $_POST['nama'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $tanggal_diterima = $_POST['tanggal_diterima'];
    $nama_barang = $_POST['nama_barang'];
    $model = $_POST['model'];
    $serial_number = $_POST['serial_number'];
    $keluhan = $_POST['keluhan'];
    $spesifikasi = $_POST['spesifikasi'];
    $kelengkapan = $_POST['kelengkapan'];
    $penawaran = $_POST['penawaran'];
    $keterangan = $_POST['keterangan'];


    if ($stmt->execute()) {
        echo "Kode Invoice Baru: " . $invoiceCode . " berhasil disimpan.";
        echo "<a href='dashboard.php' class='btn btn-outline-primary'> Kembali</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Tutup prepared statement dan koneksi database
    $stmt->close();
    $conn->close();

    return $invoiceCode;
}

// Menggunakan fungsi generateAndStoreInvoiceCode() untuk mendapatkan dan menyimpan kode invoice baru
$newInvoiceCode = generateAndStoreInvoiceCode();
?>
