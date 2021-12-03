<?php
  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  session_start();

  //phpinfo();
  require_once("dbconnection.php");
  if(!$_REQUEST["u"]){
    header("location: /BabboSegreto/");
  }
  $userId = $_REQUEST["u"];

  require_once("api/getUsers.php");
  require_once("api/getPairsByUserId.php");

  foreach($fetchUsers as $user){
      if($user["id"] == $fetchUserPairs[0]["gifter"]){
        $nomeGifter = $user["nome"];
      }
      if($user["id"] == $fetchUserPairs[0]["gifted"]){
        $nomeGifted = $user["nome"];
      }
  }


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
      <h1><?php echo($nomeGifter); ?></h1>
      <?php
      //print_r($fetchUserPairs);
      if($fetchUserPairs[0]){
        echo("<h2>Sei il babbo segreto di:</h2><br><p>".$nomeGifted."</p>");
      } else {
        echo("<h2>I babbi segreti stanno per essere scelti, la pagina si ricaricherà automaticamente");
      }
      ?>  
    </center>
  </body>
</html>
