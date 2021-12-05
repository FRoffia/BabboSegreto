<?php
  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  session_start();

  //phpinfo();
  require_once("dbconnection.php");
  if(!$_REQUEST["u"]){
    header("location: /BabboSegreto/");
  }
  $userHash = $_REQUEST["u"];
  $year = $_REQUEST["y"];

  require_once("api/getUsers.php");

  foreach($fetchUsers as $user){
    //echo($user["nome"].md5($user["nome"]));
    if( md5($user["nome"]) == $userHash){$userId = $user["id"]; $nomeGifter = $user["nome"];}
  }

  require_once("api/getPairsByUserId.php");

  //print_r($fetchUserPairs);
  if($fetchUserPairs && substr($fetchUserPairs[0]["insertDate"], 0, 4) == $year){
    foreach($fetchUsers as $user){
      if($user["id"] == $fetchUserPairs[0]["gifted"]){
        $nomeGifted = $user["nome"];
      }
    }
  }


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>BabboSegreto</title>
    <link rel="icon" type="image/x-icon" href="../img/icona.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">
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
          <img src='../img/spilla.png' class='img-fluid piccolo centra'>
        </div>
      </div>



      <div class="row">
        <div class="col text-center">
          <p class="sottotitolo"><?php echo($nomeGifter); ?></p>
        </div>
      </div>
      
      <div class="row">
        <div class="col text-center">
          <p style='font-size: 12vw!important;'>Sei il babbo segreto di:</p><br>
          <?php
          //print_r($fetchUserPairs);
          if($fetchUserPairs && substr($fetchUserPairs[0]["insertDate"], 0, 4) == $year){
            echo("
            <div class='row m-5'>
              <div class='col text-center fi'>
                <img src='../img/targ5.png' class='img-fluid medio'>
                <p class='text-center pt-2 pb-2 ass' >
                  <a class='nome' >".$nomeGifted."</a>
                </p>
              </div>
            </div>");
          } else {
            echo("<img id='load' class='carica' src='../img/load.gif'>");
          }
          ?>
        </div>
      </div>
    </div>
    <script>
      var year=<?php if($fetchUserPairs && substr($fetchUserPairs[0]["insertDate"], 0, 4) == $year){echo($year);}else{echo("0");}?>

      if(!year){
        $(document).ready(function(){
          setInterval(function(){
            $.ajax({
              url: "../api/controllaCoppie.php",
              method: "GET",
              data:{ y: <?php echo($year) ?>, u: '<?php echo($userId)?>'},
              error: function(){alert("mRda")},
              success: function(data){if(Number(data)){location.reload()}}
            });
          }, 2000);
        });
      }
    </script>
  </body>
</html>
