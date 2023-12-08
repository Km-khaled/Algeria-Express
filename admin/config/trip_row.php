<?php
// nb trip 
$nbt = $conn->query("SELECT trip.id_trip FROM trip");
$nbt_row = $nbt->rowcount();
// nb trip available
$nbta = $conn->query("SELECT trip.id_trip FROM trip WHERE trip.statut=0");
$nbta_row = $nbta->rowcount();


// nb trip available
$text ="Trip Number";
$nbtna = $conn->query("SELECT trip.id_trip FROM trip WHERE trip.statut=1");
$nbtna_row = $nbtna->rowcount();
?>