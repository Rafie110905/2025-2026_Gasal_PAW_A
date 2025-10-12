<?php
$Lheight = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");
$Lheight["Dina"] = "160";
$Lheight["Eka"] = "168";
$Lheight["Fajar"] = "172";
$Lheight["Gilang"] = "169";
$Lheight["Hani"] = "162";

echo "<pre>";
print_r($Lheight);
echo "</pre>";

$keys = array_keys($Lheight);
echo "Indeks terakhir (key): " . end($keys);
?>