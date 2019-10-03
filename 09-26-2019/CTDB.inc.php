<?php
$servername = "localhost";
$dBUsername = "sw344";
$dBPassword = "ShayWalker";
$dBName = "EnInveM";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
  die("Connection failed: ".mysqli_connect_error());
} 
?>
