<?php
 
// CLASS QUI VERIFIE QUE LES INFORMATIONS DE CONNEXION ET D'INSCRIPTION SOIT CORRECTES ET QUI PERMET LA CONNEXION 

class Verification {

     private $db;

     public function __construct($db){
          $this->db = $db;
     }

     private function verifAccount() {
          $req = $this->db->prepare('SELECT id, mot_de_passe FROM administrateur WHERE login = :login');
          $req->execute([
               ':login' => $_POST['email'],
          ]);
          $result = $req->fetch();
          
          $isPasswordCorrect = password_verify($_POST['password'], $result['mot_de_passe']);
          
          if($result == null) {
               $_SESSION['emailError'] = 1;
               header('location: ../index.php?MonCompte');
          } else {
               if ($isPasswordCorrect){
                    $_SESSION['id'] = $result['id'];
                    $_SESSION['login'] = $_POST['email'];
                    unset($_SESSION['errorAdmin']); // VARIABLE SESSION DE ADMIN.CLASS
                    header('location: ../index.php?MonCompte');
               } else {
                    $_SESSION['passwordError'] = 1;
                    header('location: ../index.php?MonCompte');
               }
          }
          return $result;
     }

     public function getVerifAccount(){
          $req = $this->verifAccount();
          return $req;
     }

     private function verifEmail(){
          $req = $this->db->prepare('SELECT login FROM administrateur WHERE login = :login');
          $req->execute([
               ':login' => $_POST['email'],
          ]);
          $result = $req->fetch();

          if($result){
               $_SESSION['emailExistError'] = 1;
               header('location: ../index.php?NewCompte');
          }
     }

     public function getVerifEmail(){
          $req = $this->verifEmail();
          return $req;
     }


}