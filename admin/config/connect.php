<?php 
$conn = new PDO('mysql:host=localhost;dbname=login', 'root', '');

$con= new mysqli("localhost","root","","login");
if(!$con){
die(mysqli_error($con));
}
?> 