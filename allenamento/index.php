<?php
    include '../dbservice/dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
</style>
<body>
    <?php
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "select id, nome from esercizio";
    $result = $conn->query($sql);
    

    while($row = $result->fetch_assoc()) {
        echo '<fieldset>';
        echo '<legend>' . $row["nome"] . '</legend>';
        
        $sql = "select id, numero from seres where esercizio = " . $row["id"];
        $seres_result = $conn->query($sql);
        echo 'Peso: <input id="peso' . $row["id"] . '" type="number" onchange="setPeso()">' . 
            '<table>';
        while($serie = $seres_result->fetch_assoc()) {
            echo '<tr>' . 
                    '<td>' . $serie["numero"] . '</td>' .
                    '<td>' . 
                    '<form>' .
                        '<input type="hidden" name="esercizio" value="' . $row["id"] . '">' .
                        '<input class="peso' . $serie["id"] . '" type="hidden" name="peso">' .
                        '<input type="submit" value="+">' .
                    '</form>' .
                    '</td>' . 
                '</tr>';
        }
        echo '</table></fieldset>';
    }

    $conn->close();
    ?>
    <script>
        function setPeso(id) {
            console.log(id);
            let peso = document.getElementById("peso" + id).value;
            let series = document.getElementsByClassName('peso' + id);
            series.forEach(serie => {
                serie.value = peso;
            })
        }
    </script>
</body>
</html>