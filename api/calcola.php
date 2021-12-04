<?php
  require_once("../dbconnection.php");
  require_once("getUsers.php");

  $estrazione = $_REQUEST["e"][0];
  $estrazione++;

  shuffle($fetchUsers);
  $arrayShuffle = array();
  $i = 0;
  foreach($fetchUsers as $user){
    $arrayShuffle[$i] = $user["id"];
    $i++;
  }

  print_r($arrayShuffle);
  
  for($i = 0; $i < (count($arrayShuffle))-1; $i++){
    $db->postPair($arrayShuffle[$i],$arrayShuffle[$i+1],$estrazione);
  }
  $db->postPair($arrayShuffle[$i],$arrayShuffle[0],$estrazione);


  echo("ok");




?>