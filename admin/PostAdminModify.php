<?php require_once '../app/Database.php';
$db = new Database();

if(!isset($_SESSION['errorAdmin'])) {

     $errors = [];

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
     session_start();

     if(!empty($errors)){
          $_SESSION['errors'] = $errors;
          $_SESSION['inputs'] = $_POST;
          header('location: ../index.php?AdminModify');
     } else if(!empty($_FILES['image']['name'])) {
          $req = $db->prepare('UPDATE produit SET nom = :nom, prix = :prix, images = :image, categorie = :categorie, Description = :desc WHERE id = :id');
          $req->execute([
               'id' => $_POST['id'],
               'nom' => $_POST['Nom'],
               'prix' => $_POST['Prix'],
               'image' => 'img/' . $_FILES['image']['name'],
               'categorie' => $_POST['categorie'],
               'desc' => $_POST['Desc'],
          ]);
          $_SESSION['success'] = 1;
          header('location: ../index.php?AdminModify');
     } else {
          $req = $db->prepare('UPDATE produit SET nom = :nom, prix = :prix, categorie = :categorie, Description = :desc WHERE id = :id');
          $req->execute([
               'id' => $_POST['id'],
               'nom' => $_POST['Nom'],
               'prix' => $_POST['Prix'],
               'categorie' => $_POST['categorie'],
               'desc' => $_POST['Desc'],
          ]);
          $_SESSION['success'] = 1;
          header('location: ../index.php?AdminModify');
     }
} else {
     header('location: index.php');
}