<?php
session_start();

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
    <title>Mstore Apps</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<style type="text/css">
.logo {
    max-width: 100%; /* Maksimum lebar gambar adalah 100% lebar elemen yang mengandungnya */
    height: auto; /* Menjaga perbandingan aspek gambar saat mengubah lebar */
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
        <h2>Tanda Terima Service</h2>
        <hr>
        </center>
        <p style="text-align: right; margin-right: 10px;">PERHATIAN !!!<br>
            Biaya Pemeriksaan/Pembatalan dikenakan Rp.100.000,-<br>
            Kerusakan Program/terkena virus tidak bergaransi
        </p>
    </div>

    <div class="content">
        <form method="post" action="proses_tanda_terima.php">
            <label class="label-colon" for="nama">Nama:</label>
            <input type="text" name="nama" id="nama"><br>

            <label class="label-colon" for="nomor_telepon">Nomor Telepon:</label>
            <input type="text" name="nomor_telepon" id="nomor_telepon"><br>

            <label class="label-colon" for="tanggal_diterima">Tanggal Diterima:</label>
            <input type="datetime-local" name="tanggal_diterima" id="tanggal_diterima">
            <br>

            <label class="label-colon" for="nama_barang">Nama Barang:</label>
            <input type="text" name="nama_barang" id="nama_barang"><br>

            <label class="label-colon" for="model">Model:</label>
            <input type="text" name="model" id="model"><br>

            <label class="label-colon" for="serial_number">Serial Number:</label>
            <input type="text" name="serial_number" id="serial_number"><br>

            <label class="label-colon" for="keluhan">Keluhan:</label>
            <input type="text" name="keluhan" id="keluhan"><br>

            <label class="label-colon" for="spesifikasi">Spesifikasi:</label>
            <input type="text" name="spesifikasi" id="spesifikasi"><br>

            <label class="label-colon" for="kelengkapan">Kelengkapan:</label>
            <input type="text" name="kelengkapan" id="kelengkapan"><br>

            <label class="label-colon" for="penawaran">Penawaran:</label>
            <input type="text" name="penawaran" id="penawaran"><br>

            <label class="label-colon" for="keterangan">Keterangan:</label>
            <input type="text" name="keterangan" id="keterangan"><br>

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

            <input type="submit" name="submit" value="Kirim" class="btn btn-outline-primary">
        </form>
    </div>
</body>
</html>
