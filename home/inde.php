<?php
  include '../dbservice/dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body onload="cambia_ora()">
    <div class="wrapper">

        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <p>Bootstrap Sidebar</p>
            </div>
    
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Home 1</a>
                        </li>
                        <li>
                            <a href="#">Home 2</a>
                        </li>
                        <li>
                            <a href="#">Home 3</a>
                        </li>
                    </ul>
                </li>
                <li class="list-group-item">
                    <a href="#">About</a>
                </li>
                <li class="list-group-item">
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
                    </ul>
                </li>
                <li class="list-group-item">
                    <a href="#">Portfolio</a>
                </li>
            </ul>
        </nav>
    
        <!-- Page Content -->
        <div id="content">
            <p class="content-title">Content title</p>
            <div class="card m-3">
                <div class="card-body">
                  <h3 class="card-title">Per oggi</h3>
                  <ul class="list-group m-2">
                    <?php
                      $conn = connect();
                      $sql = 'select distinct muscolo from esercizio';
                      $result = $conn->query($sql);
                      $conn->close();
                      if ($result->num_rows > 0) {
                        while($es = $result->fetch_assoc()) {
                          echo '<li class="list-group-item">'.$es['muscolo'].'</li>';
                        }
                      }
                    ?>
                  </ul> 
                </div>
            </div>
            <canvas id="mioCanvas" width="400" height="400">
                Attenzione: Il tuo browser non supporta il tag canvas.
            </canvas>
            <script src="/scheda/orologio.js"></script>
        </div>
    
    </div> 
    

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>