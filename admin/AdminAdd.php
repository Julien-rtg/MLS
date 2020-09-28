<?php
$db = new Database();
$admin = new Admin();
$form = new Form(isset($_SESSION['inputs']) ? $_SESSION['inputs'] : []);
$admin->getControlAdminLog($db);

if(!isset($_SESSION['errorAdmin'])){ ?>

     <?php $req = $db->prepare('SELECT DISTINCT categorie FROM produit');
     $req->execute();
     $result = $req->fetchAll(PDO::FETCH_OBJ);
     ?>

     <div class="mainBlocAdmin">
     
          <?php if(array_key_exists('errors', $_SESSION)){ ?>
               <div class="alert alert-danger">
                    <?= implode ('<br>', $_SESSION['errors']); ?>
               </div>
          <?php } ?>

          <?php if(array_key_exists('success', $_SESSION)){ ?>
               <div class="alert alert-success">
                    Produit ajouté en base de données !
               </div>
          <?php } ?>

          <form action="admin/PostAdminAdd.php" class="col-md-6" method="POST" enctype="multipart/form-data">
               <?= $form->text('Nom', 'Nom du produit :', ""); ?>

               <?= $form->number('Prix', 'Prix :', ""); ?>

               <label for="image">Image : Extensions d'images autorisées ('jpg', 'jpeg', 'png')</label>
               <input required class="form-control" type="file" name="image"> <br>

               <label for="Categorie">Categorie de produit :</label>
               <p class="boldText">Ne rien mettre si pas de catégorie approprié, "Saveurs / Sushi Maki" = produits qui sont affichés
               dans la catégorie Saveurs de la page Formule et dans la catégorie Sushi Maki</p>

               <select name="categorie" id="cate-select" class="form-control">
                    <?php foreach($result as $value){ ?>
                         <option value="<?= $value->categorie ?>"><?= $value->categorie ?></option>
                    <?php } ?>
               </select> <br>

               <p class="boldText">RAJOUTER "&lt;br&gt;" a la fin de chaque ligne pour un affichage optimal !!!</p>
               <?= $form->textarea('Desc', 'Description du produit :', "") ?>

               <button type="submit" class="btn btn-primary">Ajouter le produit</button>
          </form>
          
     </div>


<?php } else {
     header('location: index.php');
}

unset($_SESSION['success']);
unset($_SESSION['errors']);