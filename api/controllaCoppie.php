<?php
    require_once("../dbconnection.php");
    //print_r($_REQUEST);
    $year = $_REQUEST["y"];
    $userId = $_REQUEST["u"];

    require_once("getPairsByUserId.php");

    //print_r($fetchUserPairs);

    if($fetchUserPairs && substr($fetchUserPairs[0]["insertDate"], 0, 4) == $year){
        echo(1);
    } else {
        echo(0);
    }

?>