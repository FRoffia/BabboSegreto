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


      <div class="row">
        <div class="col text-center testo">
          <input type="button" class="btn btn-light btn-lg mb-5" value="Calcola coppie" id="calcola">
          <?php if($fetchLastPair[0]){ echo("<p>Ultime Coppie Generate Il: <span id='data'>".$fetchLastPair[0]['insertDate']."</span></p>");}?>
        </div>
      </div>

      <div class="row">
        <div class="col text-center">
          <img id="load" class="carica" src="img/load.gif">
        </div>
      </div>

      <table class="table mt-5">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">Data Inserimento</th>
            <th scope="col">Link</th>
          </tr>
        </thead>
        <tbody>
          <?php
            foreach($fetchUsers as $user){
              echo("
              <tr>
                <th scope='row'>".$user['id']."</th>
                <td>".$user['nome']."</td>
                <td>".$user["insertDate"]."</td>
                <td><input type='hidden' value='localhost/BabboSegreto/utente.php/?u=".md5($user["nome"])."&y=".date('Y')."' id='u".$user['id']."'></input>
                <button class='' type='button' onclick='copyToClipboard(".'"'.'u'.$user["id"].'"'.")'>Copia</button>
              </tr>");
            }
          ?>
        </tbody>
      </table>

    </div>

      

  </body>
  <script>
    
    $("#load").hide();
    
    var dt = new Date();

    $("#calcola").click(function(){
      $("#load").show();
      $("#carica").attr("disabled", "disabled");
      $.ajax({
        url: "api/calcola.php",
        method: "POST",
        data:{ e: [<?php echo($fetchLastPair[0]["estrazione"]) ?>]},
        error: function(){alert("mRda")},
        complete: function(){var mesi = dt.getMonth()+1;$("#load").hide();$("#carica").removeAttr("disabled");$("#data").html(dt.getFullYear()+"-"+ mesi + "--" +dt.getDate()+" "+dt.getHours()+":"+dt.getMinutes()+":"+dt.getSeconds())}
      });
    });

    function copyToClipboard(id) {

      /*var $temp = $("<input>");
      $("body").append($temp);
      $temp.val($(element).text()).select();
      document.execCommand("copy");
      $temp.remove();*/

      //alert(id)

      var copyText = document.getElementById(id);

      /* Select the text field */
      copyText.select();
      //copyText.setSelectionRange(0, 99999); /* For mobile devices */

      //document.focus();

      /* Copy the text inside the text field */
      navigator.clipboard.writeText(copyText.value);

      /* Alert the copied text */
      alert("Copied the text: " + copyText.value);
    }
  </script>
</html>
