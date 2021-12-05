<?php
class DbConnection {

    private $pdo;

    public function __construct() {
        $host = "localhost";
        $user = "francesco";
        $password = "password";

        try{
          $this->pdo = new PDO("mysql:host=$host;dbname=babboSegreto",$user,$password);

        } catch (PDOException $e) {
      		$this->pdo = null;
      		die("Errore in connessione : " . $e->getMessage());
      	};
     }


    public function getUsers() {
      $sql = "select * from users";

      $stmt = $this->pdo->query($sql);
      $stmt->execute();

      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

      return $rows;
    }

    public function getPairsByUserId($gifterId) {
      $sql = "select * from pairs where gifter = '$gifterId' order by id desc";

      $stmt = $this->pdo->query($sql);
      $stmt->execute();

      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

      return $rows;
    }

    public function postPair($idGifter, $idGifted, $estraction) {
      $sql = "insert into pairs (gifter,gifted,estrazione) values ('$idGifter', '$idGifted', '$estraction')";
    
      $stmt = $this->pdo->query($sql);
    }

    public function getLastPair() {
      $sql = "select * from pairs order by id desc limit 1";

      $stmt = $this->pdo->query($sql);
      $stmt->execute();

      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

      return $rows;
    }
}





?>
