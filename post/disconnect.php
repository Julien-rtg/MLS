<?php

session_start();


if(isset($_SESSION['login']) && (isset($_SESSION['id']))){
     unset($_SESSION['id']);
     unset($_SESSION['login']);
     $_SESSION['successDisconnect'] = 1;
     header('location: ../index.php?MonCompte');
} else {
     $errors = [];
     if(!array_key_exists($_SESSION['id'] || ($_SESSION['login']))){
          $errors['account'] = 'Vous n\'êtes pas connecté à un compte';
     }
     $_SESSION['errors'] = $errors;
     header('location: ../index.php?MonCompte');
}