<?php
// nb train 
$nbt = $conn->query("select * from train");
$nbt_row = $nbt->rowcount();


// nb train available
$nbta = $conn->query("select * from train where train.statut=1");
$nbta_row = $nbta->rowcount();


// nb train not available
$nbtna = $conn->query("select * from train where train.statut=0");
$nbtna_row = $nbtna->rowcount();
?>