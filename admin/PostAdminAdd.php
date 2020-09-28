<?php
require_once '../app/Database.php';
require_once '../model/Admin.class.php';
$db = new Database();
$admin = new Admin();
$admin->getControlAdminLog($db);
session_start();

if(!isset($_SESSION['errorAdmin'])){ 

     $errors = [];
     var_dump($_POST);
     var_dump($_FILES);

     if(isset($_FILES['image']) & $_FILES['image']['error'] == 0) {
          if($_FILES['image']['size'] <= 256000) {
               $infosFichier = pathinfo($_FILES['image']['name']);
               $extensionUpload = $infosFichier['extension'];
               $extensionsAutorisees = array('jpg', 'jpeg', 'png');
               if(in_array($extensionUpload, $extensionsAutorisees)){
                    move_uploaded_file($_FILES['image']['tmp_name'], '../img/' . basename($_FILES['image']['name']));
               } else {
                    $errors['extension'] = "Extensions d'image non autorisées";
               }
          }
          else {
               $errors['taille'] = "Image trop volumineuse";
          }
     }

     if(!empty($errors)){
          $_SESSION['errors'] = $errors;
          $_SESSION['inputs'] = $_POST;
          header('location: ../index.php?AdminAdd');
     } else {
          $req = $db->prepare('INSERT INTO produit (id, nom, prix, images, categorie, Description) VALUES (NULL, :nom, :prix, :image, :categorie, :desc)');
          $req->execute([
               'nom' => $_POST['Nom'],
               'prix' => $_POST['Prix'],
               'image' => 'img/' . $_FILES['image']['name'],
               'categorie' => $_POST['categorie'],
               'desc' => $_POST['Desc'],
          ]);
          $_SESSION['success'] = 1;
          header('location: ../index.php?AdminAdd');
     }


} else {
     header('location: index.php');
}