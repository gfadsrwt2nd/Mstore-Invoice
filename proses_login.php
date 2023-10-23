<?php
// Mengatur informasi koneksi ke basis data

$host = "localhost";
$username = "root";
$password = "";
$database = "mstoreinvoice";

// Membuat koneksi ke basis data
$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query untuk memeriksa apakah username dan password cocok
    $query = "SELECT id, username, password FROM pengguna WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) == 1) {
        // Autentikasi berhasil
        session_start();
        $_SESSION["username"] = $username;
        header("Location: dashboard.php"); // Ganti "dashboard.php" dengan halaman tujuan setelah login
        exit();
    } else {
        // Autentikasi gagal
        header("Location: login.php"); // Ganti "login.php" dengan halaman login jika login gagal
        exit();
    }
} else {
    // Jika bukan metode POST, arahkan kembali ke halaman login
    header("Location: login.php");
    exit();
}

// Tutup koneksi ke basis data
mysqli_close($koneksi);
