<?php

// 
// 
// 

class Database {

     private $pdo;

     private function getPDO() {
          if ($this->pdo === null) {
               $pdo = new PDO ('mysql:host=;dbname=;charset=utf8', '', '');
               $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $this->pdo = $pdo;
          }
          return $this->pdo;
     }

     public function query($statement) {
          $req = $this->getPDO()->query($statement);
          return $req->fetchAll(PDO::FETCH_OBJ);
     }

     public function queryArray($statement, $data = array()) {
          $req = $this->getPDO()->prepare($statement);
          $req->execute($data);
          return $req->fetchAll(PDO::FETCH_OBJ);
     }

     public function prepare($statement){
          $req = $this->getPDO()->prepare($statement);
          return $req;
     }
}