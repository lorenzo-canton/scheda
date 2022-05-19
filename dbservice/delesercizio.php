<?php
    include 'dbconnect.php';
    $conn = connect();
    $sql = 'delete from esercizio where id ='.$_POST["id"];

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    header("location: /scheda/programmazione");
?>