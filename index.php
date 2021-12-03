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
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/bootstrap.js"></script>
    <script src="js/popper1143.js"></script>
    <script src="js/jquery331.js"></script>
    
  </head>
  <body>
    <center>
    <h1>Babbo Segreto Clan Uqbar</h1>
    <?php
      foreach($fetchUsers as $user){
        echo("<a href='utente.php/?u=".$user['id']."'>".$user['nome']."</a><br>");
      }
    ?>
    <a href="admin.php"> Gestisci Utenti/Crea coppie </a>
    </center>
  </body>
</html>
