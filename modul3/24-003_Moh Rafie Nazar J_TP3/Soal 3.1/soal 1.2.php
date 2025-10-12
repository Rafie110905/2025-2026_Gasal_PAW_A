<?php

$Lfruits = array("Avocado", "Blueberry", "Cherry");
unset($Lfruits[2]);
print_r($Lfruits);
echo "<br><br>Indeks tertinggi sekarang: " . (count($Lfruits) - 1);
?>