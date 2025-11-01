<?php
include 'config.php';

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    mysqli_query($conn, "INSERT INTO supplier (nama, telp, alamat) VALUES ('$nama','$telp','$alamat')");
    header("Location: supplier.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Supplier</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5" style="max-width:600px;">
    <h3 class="mb-4 text-center text-success">Tambah Data Supplier</h3>
    <form method="POST">
        <div class="mb-3">
            <label>Nama Supplier</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>No. Telepon</label>
            <input type="text" name="telp" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" required>
        </div>
        <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
        <a href="supplier.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html>