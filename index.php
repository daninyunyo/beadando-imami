<?php
    if(isset($_POST['felhasznalo']) && isset($_POST['jelszo'])) {
        try {
            // Kapcsolódás
            $dbh = new PDO('mysql:host=localhost;dbname=imami', 'root', '',
                            array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
            
            // Felhsználó keresése
            $sqlSelect = "select id, csaladi_nev, uto_nev from felhasznalok where bejelentkezes = :bejelentkezes and jelszo = sha1(:jelszo)";
            $sth = $dbh->prepare($sqlSelect);
            $sth->execute(array(':bejelentkezes' => $_POST['felhasznalo'], ':jelszo' => $_POST['jelszo']));
            $row = $sth->fetch(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e) {
            echo "Hiba: ".$e->getMessage();
        }      
    }
?>

<!doctype html>
<html lang="hu">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet" type="text/css">
    <title>PecsiMami</title>
  </head>

  <body>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<div class="text-center">
        <img src="img/logo.png" class="rounded img-fluid" style="max-width: 50%;" alt="PecsimMami_logo">
      </div>

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgb(255, 179, 136);" >
        <div class="container-fluid">
            <a class="navbar-brand" style="font-size:large; " href="https://pecsimami.hu/ingatlan">PécsiMami</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" style="font-size:large;" id="navbarNav">
              <ul class="navbar-nav">
                <?php
                $menuk = array("Főoldal", "Belépés", "Galéria", "Videó", "Kapcsolat");
                $db = count($menuk);
                for ($i=0; $i<$db; $i++)
                {
                echo '<li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?d='.$i.'">'.$menuk[$i].'</a>
                      </li>';
                }
                ?>
                <li class="nav-item">
                <?php if(isset($row)) {
                    if($row) {
                    echo "Belépett: <strong>".$row['csaladi_nev']." ".$row['uto_nev']."</strong>";
                    } else { echo "Sikertelen belépés!"; } 
                }
        ?>
                </li>
              </ul>
            </div>
          </div>
        </nav>

<div class="col order-first col-md-8 offset-md-1" style="float:left; margin-top:15px;">
  <?php 

    if (!isset($_GET["d"])) {$_GET["d"] = 0;}
    switch($_GET["d"])
    {
    case 0: include "menu0.php"; break;
    case 1: include "menu1.php"; break;
    case 2: include "menu2.php"; break;
    case 3: include "menu3.php"; break;
    case 4: include "menu4.php"; break;
    default: include "menu0.php"; break;
    }

  ?>

  </div>
  <div style="display: inline-grid;
    float: right; width:20%; margin:20px;">
            <h3 class="float-end"> 
                Jelentkezz
                <small class="text-muted">hírlevelünkre</small>
            </h3>
            <img src="img/iratkozz.png"  style="max-width: 100%;" alt="iratkozz fel"><br>
            <br> <img src="img/csalad.png"  style="max-width: 100%;" alt="csalad">
        </div>
  

  </body>
</html>