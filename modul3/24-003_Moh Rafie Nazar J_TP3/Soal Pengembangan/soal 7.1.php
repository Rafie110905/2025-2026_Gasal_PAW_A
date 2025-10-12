<?php
$produk = array(
  "Laptop" => 7500000,
  "Mouse" => 150000,
  "Keyboard" => 250000,
  "Monitor" => 1800000
);

foreach($produk as $item => $harga){
  echo "$item = Rp " . number_format($harga,0,',','.') . "<br>";
}
?>
