<?php
  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  session_start();

  //phpinfo();
  require_once("dbconnection.php");
  require_once("api/getUsers.php");
  require_once("api/getLastPair.php");
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
      <h1>Lista utenti:</h1>
    <?php
      foreach($fetchUsers as $user){
        echo("<p href='utente.php/?u=".$user['id']."'>".$user['nome']."</p>");
      }
    ?>
      <input type="button" value="Calcola coppie" id="calcola">
      <?php if($fetchLastPair[0]){ echo("<p>Ultime Coppie Generate Il: ".$fetchLastPair[0]['insertDate']."</p>");}?>
    </center>
  </body>
  <script>
    $("#calcola").click(function(){
      $.ajax({
        url: "api/calcola.php",
        error: function(){alert("mRda")}
      })
    });  
  </script>
</html>
