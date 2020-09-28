<?php

$db = new Database();
$admin = new Admin();
$admin->getControlAdminLog($db);

if(!isset($_SESSION['errorAdmin'])){ ?>


     <div class="mainBlocAdmin BlocAdminBtn">

          <div class="btn-group-vertical AdminBtn">
               <div class="uniqBtn">
                    <a class="btn btn-primary" href="index.php?AdminAdd">Ajouter Produit</a>
               </div>
               <div class="uniqBtn">
                    <a class="btn btn-primary" href="index.php?AdminModify">Modifier produit</a>
               </div>
               <div class="uniqBtn">
                    <a class="btn btn-danger" href="index.php?AdminSuppr">Supprimer produit</a>
               </div>
               
               
          </div>

     
     </div>

<?php } else {
     header('location: index.php');
}