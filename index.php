<?php
    include '../scheda/dbservice/dbconnect.php';
    function getCedimento($conn, $esercizio) {
        $sql = 'select serie, peso from cedimento where esercizio = ' . $esercizio . ' ORDER by giorno DESC LIMIT 1';
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return null;
    }
    function printEsercizi($conn) {
        $sql = "select * from esercizio";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($esrow = $result->fetch_assoc()) {
                echo '<div class="card-dark p-1 m-2 border border-light" style="width: 26rem;">' .
                        '<div class="card-body">' . 
                        '<h5 class="card-title">' . $esrow["muscolo"] . '</h5>' .
                        '<p class="text-muted">' . $esrow["nome"] . '</p>' .
                        '<p>' . $esrow["serie"] . '</p>';

                $cedimento = getCedimento($conn, $esrow["id"]);
                if ($cedimento  != null) {
                    echo '<p class="card-subtitle">Ultimo cedimento: serie [ ' . $cedimento["serie"] . ' ] peso [ ' . $cedimento["peso"] . ' ]</p>';
                }
        
                echo    '<form action="/scheda/dbservice/addcedimento.php" method="POST">' .
                            '<input type="hidden" name="esercizio" value="' . $esrow["id"] . '">' .
                            ' Serie: <input type="text" name="serie"><br>' . 
                            ' Peso: <input type="text" name="peso">' .
                            ' <input type="submit" value="ADD">' .
                        '</form>' .
                    '</div></div>';
            }
        }
        $conn->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Scheda</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body class="bg-dark text-light">

<form action="/scheda/dbservice/addesercizio.php" method="POST"
    class="m-5">   
<h3 for="basic-url">Nuovo esercizio</h3>
<div class="input-group mb-3">
    <div class="input-group-append">
        <span class="input-group-text" id="basic-addon2">Muscolo</span>
    </div>
    <input type="text" class="form-control" placeholder="Petto" name="muscolo">
</div>
<div class="input-group mb-3">
    <div class="input-group-append">
        <span class="input-group-text" id="basic-addon2">Nome</span>
    </div>
    <input type="text" class="form-control" placeholder="Bench press" name="nome">
</div>
<div class="input-group mb-3">
    <div class="input-group-append">
        <span class="input-group-text" id="basic-addon2">Serie</span>
    </div>
    <input type="text" class="form-control" placeholder="3x10" name="serie">
    <div class="input-group-append">
        <input type="submit" class="form-control" value="INVIA">
    </div>
</div>
</form>
<div class="d-flex flex-wrap m-5">
    <?php printEsercizi($conn) ?>    
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>