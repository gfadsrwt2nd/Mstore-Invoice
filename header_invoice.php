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

    <div class="pencarian">
        <a href="total_invoice.php" class="btn btn-outline-primary">Kembali</a>
    </div>

    <br><br>