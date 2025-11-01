<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Master Supplier</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Data Master Supplier</h4>
        <a href="tambah_supplier.php" class="btn btn-success">Tambah Data</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-primary text-center">
            <tr>
                <th width="5%">No</th>
                <th>Nama</th>
                <th>Telp</th>
                <th>Alamat</th>
                <th width="20%">Tindakan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $query = mysqli_query($conn, "SELECT * FROM supplier ORDER BY id ASC");
            if (mysqli_num_rows($query) > 0) {
                while ($row = mysqli_fetch_assoc($query)) {
                    echo "<tr>";
                    echo "<td class='text-center'>".$no++."</td>";
                    echo "<td>".$row['nama']."</td>";
                    echo "<td>".$row['telp']."</td>";
                    echo "<td>".$row['alamat']."</td>";
                    echo "<td class='text-center'>
                            <a href='edit_supplier.php?id=".$row['id']."' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='hapus_supplier.php?id=".$row['id']."' class='btn btn-danger btn-sm' onclick='return confirm(\"Anda yakin akan menghapus supplier ini?\")'>Hapus</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5' class='text-center'>Belum ada data supplier</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>