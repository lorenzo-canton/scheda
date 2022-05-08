<?php
    include '../dbservice/dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scheda</title>
</head>
<style>
    body {
        background-image: url('/img/zyzz.jpg'); 
        background-repeat: repeat-y;
        background-position: center;
        background-attachment: fixed;
        background-position: 40% 80%;
        background-size: 1920px 1080px;
    }
    h1 {
        background-color: black;
        color: white;
        text-align: center;
    }
    legend, label, p, table {
        background-color: white;
        width: fit-content;
    }
    input.rep {
        width: 40px;
    }
</style>
<body>
    <h1>STOP SAYNG ONE DAY <br> START SAYNG DAY ONE</h1>
    <a href="/allenamento"><h4>Allenamento</h4></a>
    <fieldset>
        <legend>Nuovo esercizio</legend>
        <form action="/dbservice/addesercizio.php" method="POST">
            <label>Nome:</label>
            <input type="text" name="nome">
            <br>
            <label>Descrizione:</label>
            <input type="text" name="descrizione">
            <br>
            <input type="submit" value="Aggiungi">
        </form>
    </fieldset>
    <?php
        // ESERCIZIO
        $sql = "select * from esercizio";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($esrow = $result->fetch_assoc()) {
                echo "<fieldset>";
                echo "<legend>" . $esrow["nome"] . "</legend>";
                echo '<p>' . $esrow["descrizione"] . '</p>';
                // SERIE
                $sql = "select * from seres where esercizio = " . $esrow["id"];
                $serresult = $conn->query($sql);
                
                echo "<table>";
                if ($serresult->num_rows > 0) {
                    while($serrow = $serresult->fetch_assoc()) {
                        echo "<td>" . $serrow["numero"] . "</td>";
                    }
                }
                echo '<td><form action="/dbservice/addserie.php" method="POST">' .
                        '<input type="hidden" name="esercizio" value="' . $esrow["id"] . '">' . 
                        '<input class="rep" type="text" name="numero">' . 
                        '<input type="submit" value="add">';
                echo "</form></table></fieldset>";
            }
        }
        $conn->close();
    ?>
</body>
</html>