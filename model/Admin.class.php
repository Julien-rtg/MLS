<?php

class Admin {

     private $db;

     public function display(){
          if(isset($_SESSION['id'])){
               if($_SESSION['id'] == 1){
                    echo '<p class="text-white"><a href="index.php?Admin">Gérer les produits</a></p>';
               } else {
                    return;
               }
          }else {
               return;
          }
     }

     private function controlAdminLog($db){
          $this->db = $db;

          if(isset($_SESSION['id']) AND isset($_SESSION['login'])){
               $req = $this->db->prepare('SELECT id, login FROM administrateur WHERE id = :id AND login = :login');
               $req->execute([
                    ':id' => $_SESSION['id'],
                    ':login' => $_SESSION['login'],
               ]);
               $result = $req->fetch();

               if(!$result){
                    $_SESSION['errorAdmin'] = 1;
               } else {

               }
          } else {
               $_SESSION['errorAdmin'] = 1;
          }
          
     }


     public function getControlAdminLog($db){
          $req = $this->controlAdminLog($db);
          return $req;
     }

}