<?php
// Inisialisasi sesi
session_start();

// Hapus semua variabel sesi
session_unset();

// Hancurkan sesi
session_destroy();

// Redirect ke halaman login atau halaman lain sesuai kebijakan aplikasi
header("Location: login.php"); // Ganti "login.php" dengan halaman login atau tujuan lain
exit();
