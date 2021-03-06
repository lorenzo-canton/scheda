<?php
    include '../dbservice/dbconnect.php';
    function getCedimento($esercizio) {
      $conn = connect();
      $sql = 'select serie, peso from cedimento where esercizio = ' . $esercizio . ' ORDER by giorno DESC LIMIT 1';
      $result = $conn->query($sql);
      $conn->close();
      if ($result->num_rows > 0) {
          return $result->fetch_assoc();
      }
      return null;
    }
    function printEsercizi() {
      $conn = connect();
      $sql = "select * from esercizio";
      $result = $conn->query($sql);
      $conn->close();
      if ($result->num_rows > 0) {
          while($esrow = $result->fetch_assoc()) {
              echo '<div class="card-dark p-1 m-2 border border-primary" style="width: 26rem;">' .
                      '<div class="card-body">' . 
                      '<h5 class="card-title">' . $esrow["muscolo"] . '</h5>' .
                      '<p class="text-muted">' . $esrow["nome"] . '</p>' .
                      '<p>' . $esrow["serie"] . '</p>';
              $cedimento = getCedimento($esrow["id"]);
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
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<body>
<!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="/scheda/">Scheda</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/scheda/allenamento">Allenamento</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/scheda/programmazione">Programmazione</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/scheda/statistiche">Statistiche</a>
              </li>
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
          </div>
        </div>
    </nav>

<div class="d-flex flex-wrap m-5">
    <?php printEsercizi() ?>    
</div>


</body>
</html>