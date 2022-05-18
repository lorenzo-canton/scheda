<?php
    include 'dbconnect.php';
    
    echo $_POST["numero"];
    $conn = connect();
    $sql = 'insert into seres(esercizio, numero)' . 
    'values(' . $_POST["esercizio"] . ',"' . $_POST["numero"] . '")';

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    header("location: /scheda");
?>