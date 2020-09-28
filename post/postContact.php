<?php

$errors = [];


if(!array_key_exists('name', $_POST) || $_POST['name'] == ''){ // GESTION DES ERREURS LIES AU REMPLISSAGE DU FORMULAIRE
     $errors['name'] = "Vous n'avez pas renseigné votre nom";
} else if(!array_key_exists('email', $_POST) || $_POST['email'] == '' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
     $errors['email'] = "Vous n'avez pas renseigné un email valide";
} else if(!array_key_exists('message', $_POST) || $_POST['message'] == ''){
     $errors['message'] = "Vous n'avez pas renseigné de message";
}



session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {

     // Build POST request:
     $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
     $recaptcha_secret = '';
     $recaptcha_response = $_POST['recaptcha_response'];
 
     // Make and decode POST request:
     $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
     $recaptcha = json_decode($recaptcha);
 

     if(!empty($errors)){
          $_SESSION['errors'] = $errors;
          $_SESSION['inputs'] = $_POST;
          header('location: ../index.php?Contact');
     
     } else if ($recaptcha->score >= 0.5){
          $_SESSION['success'] = 1;
          $message = $_POST['message'];
          $from = 'Emetteur du mail -> ' . $_POST['email'];
          mail('julien.rittl@gmail.com', 'Message via site', $message, $from);
          header('location: ../index.php?Contact');
     } else {
          $errors['autre'] = 'Une erreur est survenue veuillez réessayez plus tard'; // GESTION D'UNE ERREUR GENERALE
          $_SESSION['errors'] = $errors;
          $_SESSION['inputs'] = $_POST;
          header('location: ../index.php?Contact');
     }
     
 
}