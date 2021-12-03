<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);


    $db = new DbConnection();



    //scarico tutti gli utenti
    $fetchUserPairs = $db->getPairsByUserId($userId);


?>
