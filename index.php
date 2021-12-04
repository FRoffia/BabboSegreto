<?php
  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  session_start();

  //phpinfo();
  require_once("dbconnection.php");
  require_once("api/getUsers.php");
  //echo("oooo");
  //print_r($fetchUsers)
  //print_r(getallheaders());
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>BabboSegreto</title>
    <link rel="icon" type="image/x-icon" href="img/icona.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  </head>
  <body>
    <div class="container-fluid">

      <div class="row titolo p-2">
        <div class="col m-2 p-2">
          <p class="text-center titolo">Babbo Segreto</p>
          <p class="text-center sottotitolo"> Clan Uqbar</p>
        </div>
      </div>

      <div class="row nastro border border-start-0 border-end-0  mb-5 pt-2 pb-2"><!--pt-2 pb-2-->
        <div class="border-start-0 border-end-0 col border border-white dott text-center fi pazzo"><!--p-1-->
          <img src='img/spilla.png' class='img-fluid piccolo centra'>
        </div>
      </div>


      <?php
        $i = 0;
        foreach($fetchUsers as $user){
          /*echo("
          <div class='row m-5'>
            <div class='col'></div>
            <div class='col nome'>
              <p class='text-center pt-2 pb-2' >
                <a class='nome' href='utente.php/?u=".$user['id']."'>".$user['nome']."</a>
              </p>
            </div>
            <div class='col'></div>
          </div>");*/
          $i = $i%4;
          echo("
          <div class='row m-5'>
            <div class='col text-center fi'>
              <img src='img/targ5.png' class='img-fluid medio'>
              <p class='text-center pt-2 pb-2 ass' >
                <a class='nome' href='utente.php/?u=".$user['id']."'>".$user['nome']."</a>
              </p>
            </div>
          </div>
          <div class='row m-5'>
            <div class='col text-center fi'>
              <img src='img/deco.png' class='img-fluid piccolo'>
            </div>
          </div>");
          $i++;
        }
      ?>
      <a href="admin.php"> Gestisci Utenti/Crea coppie </a>

    </div>
  </body>
</html>
