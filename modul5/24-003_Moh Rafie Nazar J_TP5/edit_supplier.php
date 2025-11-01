<?php
include 'config.php';

// Pastikan ada parameter id di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data supplier berdasarkan ID
    $query = mysqli_query($conn, "SELECT * FROM supplier WHERE id='$id'");
    $data = mysqli_fetch_assoc($query);

    // Jika data tidak ditemukan
    if (!$data) {
        echo "<script>alert('Data supplier tidak ditemukan!'); window.location='supplier.php';</script>";
        exit;
    }

} else {
    // Jika tidak ada ID di URL
    echo "<script>alert('ID supplier tidak ditemukan di URL!'); window.location='supplier.php';</script>";
    exit;
}

// Proses update data jika tombol diklik
if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    mysqli_query($conn, "UPDATE supplier SET 
        nama='$nama',
        telp='$telp',
        alamat='$alamat'
        WHERE id='$id'");

    echo "<script>alert('Data supplier berhasil diperbarui!'); window.location='supplier.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Supplier</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5" style="max-width:600px;">
    <h3 class="mb-4 text-center text-primary">Edit Data Master Supplier</h3>
    <form method="POST">
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($data['nama']); ?>" required>
        </div>
        <div class="mb-3">
            <label>Telp</label>
            <input type="text" name="telp" class="form-control" value="<?= htmlspecialchars($data['telp']); ?>" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="<?= htmlspecialchars($data['alamat']); ?>" required>
        </div>
        <button type="submit" name="update" class="btn btn-success">Update</button>
        <a href="supplier.php" class="btn btn-danger">Batal</a>
    </form>
</div>

</body>
</html>