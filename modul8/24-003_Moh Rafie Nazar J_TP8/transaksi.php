<?php
require_once 'config.php';
requireLogin();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Penjualan - Transaksi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container">
    <div class="content-box">
        <h1 class="page-title">Transaksi</h1>

        <div class="info-box">
            <h3>Menu Transaksi</h3>
            <ul>
                <li>Input Transaksi Penjualan</li>
                <li>Lihat Daftar Transaksi</li>
                <li>Edit Transaksi</li>
                <li>Hapus Transaksi</li>
            </ul>
        </div>
    </div>
</div>

</body>
</html>