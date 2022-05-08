<?php
    $servername = "localhost";
    $database = "scheda";
    $username = "scheda";
    $password = "palestra";
    
    $conn = mysqli_connect($servername, $username, $password, $database);
    
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
?>