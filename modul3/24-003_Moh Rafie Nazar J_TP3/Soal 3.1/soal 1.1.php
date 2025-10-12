<?php
$Lfruits = array("Avocado", "Blueberry", "Cherry");
array_push($Lfruits, "Durian", "Mango", "Apple", "Pear", "Orange");

echo "Isi array Lfruits:<br>";
print_r($Lfruits);
echo "<br><br>Nilai dengan indeks tertinggi adalah: " . end($Lfruits);
echo "<br>Indeks tertinggi: " . (count($Lfruits) - 1);
?>
