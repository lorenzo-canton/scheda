<?php
    include '../dbservice/dbconnect.php';
    function printCedimenti($esercizio, $nome) {
      $conn = connect();
      $sql = 'call cedimenti('.$esercizio.')';
      $result = $conn->query($sql);
      $conn->close();
      echo '<h3>'.$nome.'</h3>'. 
          '<table class="table">'.
              '<thead><tr>'.
                  '<th scope="col">Giorno</th>'.
                  '<th scope="col">Serie</th>'.
                  '<th scope="col">Peso</th>'.
              '</tr></thead>'.
              '<tbody>';
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              echo '<tr><th scope="row">'.$row["giorno"].'</th><td>'.$row["serie"].'</td><td>'.$row["peso"].'</td></tr>';
          }
      }
      echo '</tbody></table>';        
    }
    function printStatistiche() {
        $conn = connect();
        $sql = "select id, nome from esercizio";
        $result = $conn->query($sql);
        $conn->close();
        if ($result->num_rows > 0) {
            while ($esercizio = $result->fetch_assoc()) {
              printCedimenti($esercizio["id"], $esercizio["nome"]);
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scheda</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
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

    <main>
        <div class="m-3 border">
            <?php
                printStatistiche();
            ?>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
