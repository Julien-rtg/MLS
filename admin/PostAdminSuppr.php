<?php require_once '../app/Database.php';
$db = new Database();

session_start();
if(!isset($_SESSION['errorAdmin'])){

     $errors = [];

     if(isset($_POST['id'])){
          $req = $db->prepare('DELETE FROM produit WHERE id = :id');
          $req->execute([
          'id' => $_POST['id'],
          ]);
          $_SESSION['success'] = 1;
          header('location: ../index.php?AdminSuppr');
     } else {
          $errors['article'] = "Erreur dans la suppression";
          $_SESSION['errors'] = $errors;
          header('location: ../index.php?AdminSuppr');
     }


} else {
     header('location: index.php');
}