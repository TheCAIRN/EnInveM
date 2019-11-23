<?php
    $servername = "localhost";
    $dBUsername = "mtapia";
    $dBPassword = "MiguelTapia";
    $dBName = "eninvem";

    $conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

    if (!$conn) {
        die("Connection failed: ".mysqli_connect_error());
    }    
?>
