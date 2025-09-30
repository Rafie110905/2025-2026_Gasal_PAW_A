<?php
$nama = $_GET['nama'] ?? "Belum diisi";
$umur = $_GET['umur'] ?? "Belum diisi";
?>

<!DOCTYPE html>
<html>
<body>
<h2>Biodata</h2>
<table border="1">
  <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
  <tr><td>Umur</td><td><?php echo $umur; ?></td></tr>
</table>
</body>
</html>