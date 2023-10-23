<?php
include 'header_pencarian.php';

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mstoreinvoice";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Tangkap kata kunci pencarian dari URL
if (isset($_GET['cari']) && !empty($_GET['cari'])) {
    $query = $_GET['cari'];

    // Query SQL dengan prepared statement
    $sql = "SELECT kode_invoice, nama, nomor_telepon, tanggal_diterima, nama_barang, model, serial_number, keluhan
            FROM invoice
            WHERE kode_invoice LIKE ? 
            OR Nama LIKE ?
            OR Nomor_Telepon LIKE ?
            OR Tanggal_Diterima LIKE ?
            OR Nama_Barang LIKE ?
            OR Model LIKE ?
            OR Serial_Number LIKE ?
            OR Keluhan LIKE ?";

    // Persiapkan prepared statement
    $stmt = $conn->prepare($sql);

    // Periksa apakah prepared statement berhasil
    if ($stmt) {
        // Ikat parameter dan jalankan prepared statement
        $param = "%" . $query . "%";
        $stmt->bind_param("ssssssss", $param, $param, $param, $param, $param, $param, $param, $param);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<h2>Hasil Pencarian:</h2>";
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
            </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["kode_invoice"] . "</td>";
                echo "<td>" . $row["nama"] . "</td>";
                echo "<td>" . $row["nomor_telepon"] . "</td>";
                echo "<td>" . $row["tanggal_diterima"] . "</td>";
                echo "<td>" . $row["nama_barang"] . "</td>";
                echo "<td>" . $row["model"] . "</td>";
                echo "<td>" . $row["serial_number"] . "</td>";
                echo "<td>" . $row["keluhan"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Tidak ada hasil pencarian yang cocok.";
        }
        $stmt->close();
    } else {
        echo "Terjadi kesalahan dalam persiapan prepared statement.";
    }
} else {
    echo "Kata kunci pencarian tidak valid.";
}

$conn->close();

?>
