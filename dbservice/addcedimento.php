<?php
    include 'dbconnect.php';
    $conn = connect();
    $sql = 'insert into cedimento(esercizio, peso, serie, giorno) ' .
    'values("' . $_POST["esercizio"] . '","' . $_POST["peso"] . '","' . $_POST["serie"] . '","' . date('Y-m-j') . '")';

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("location: /scheda");
?>