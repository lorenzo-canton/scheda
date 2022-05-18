<?php
    include 'dbconnect.php';
    $conn = connect();
    $sql = 'insert into esercizio(muscolo, nome, serie)' . 
    'values("' . $_POST["muscolo"] . '","' . $_POST["nome"] . '","' . $_POST["serie"] . '")';

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    header("location: /scheda");
?>