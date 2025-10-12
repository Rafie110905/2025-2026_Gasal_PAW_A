<?php
$mahasiswa = array(
  array("nama"=>"Andi","nilai"=>[80,90,85]),
  array("nama"=>"Budi","nilai"=>[70,75,80]),
  array("nama"=>"Citra","nilai"=>[90,95,92])
);

function rataRata($data){
  foreach($data as $mhs){
    $avg = array_sum($mhs["nilai"]) / count($mhs["nilai"]);
    echo $mhs["nama"] . " memiliki rata-rata: " . round($avg,2) . "<br>";
  }
}

rataRata($mahasiswa);
?>