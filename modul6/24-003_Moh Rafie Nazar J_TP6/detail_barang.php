<?php
require_once 'config.php';

if (!isset($_GET['id'])) {
    echo "<script>alert('ID Nota tidak ditemukan!'); window.location='index.php';</script>";
    exit;
}

$id_nota = $_GET['id'];
$conn = getConnection();

// Ambil data master (nota)
$nota = $conn->query("SELECT * FROM nota WHERE id_nota = '$id_nota'")->fetch_assoc();
if (!$nota) {
    echo "<script>alert('Nota tidak ditemukan!'); window.location='index.php';</script>";
    exit;
}

// Ambil data detail
$detail = $conn->query("SELECT * FROM transaksi_detail WHERE id_nota = '$id_nota'");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Detail Barang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Detail Nota</h2>

    <table>
        <tr><td>No Nota</td><td>: <?= $nota['no_nota']; ?></td></tr>
        <tr><td>Tanggal</td><td>: <?= $nota['tanggal']; ?></td></tr>
        <tr><td>Customer</td><td>: <?= $nota['customer']; ?></td></tr>
        <tr><td>Total</td><td>: Rp <?= number_format($nota['total'], 0, ',', '.'); ?></td></tr>
    </table>

    <h3>Detail Barang</h3>
    <table border="1" class="table-detail">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Subtotal</th>
        </tr>

        <?php $no = 1; while ($d = $detail->fetch_assoc()) { ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $d['nama_barang']; ?></td>
            <td><?= $d['jumlah']; ?></td>
            <td>Rp <?= number_format($d['harga'], 0, ',', '.'); ?></td>
            <td>Rp <?= number_format($d['subtotal'], 0, ',', '.'); ?></td>
        </tr>
        <?php } ?>
    </table>

    <br>
    <a href="index.php"><button>Kembali</button></a>
</div>
</body>
</html>