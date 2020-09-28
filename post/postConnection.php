<?php require_once '../app/Database.php';
require_once '../model/Verification.class.php';

$db = new Database();
$verif = new Verification($db);

$verif->getVerifAccount(); // GERE LES ERREURS EN CAS D'EMAIL INEXISTANT EN BDD ET ERREUR EN CAS DE MAUVAIS MDP ($_SESSION['....Error'])
$errors = [];


if(!array_key_exists('email', $_POST) || $_POST['email'] == '' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) || ($_SESSION['emailError'])){
     $errors['email'] = 'Adresse email ou mot de passse incorrecte';
} else if (!array_key_exists('password', $_POST) || $_POST['password'] == '' || ($_SESSION['passwordError'])){
     $errors['password'] = 'Adresse email ou mot de passse incorrecte';
}

session_start();

if(!empty($errors)){

     $_SESSION['errors'] = $errors;
     $_SESSION['inputs'] = $_POST;

     header('location: ../index.php?MonCompte');

} else {

     $_SESSION['success'] = 1;
     header('location: ../index.php?MonCompte');

     $verif->getVerifAccount();
}