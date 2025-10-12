<?php
// Inisialisasi array terlebih dahulu
$Lheight = array(
    "Alice" => 160,
    "Bob" => 170,
    "Charlie" => 165,
    "David" => 175
);

unset($Lheight["Charlie"]);

$keys = array_keys($Lheight);

echo "Setelah dihapus, indeks terakhir (key): " . end($keys);
?>