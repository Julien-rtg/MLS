<?php require_once 'app/Database.php';
require_once 'model/Form.class.php';


if(!isset($_SESSION['errorAdmin'])) {

     $db = new Database();
     $form = new Form(isset($_SESSION['inputs']) ? $_SESSION['inputs'] : []); ?>

     <div class="mainBlocAdmin">

          <form action="index.php?AdminModify" method="POST">

               <label for="prod-select">Choisissez un Produit :</label>

               <select name="prods" id="prod-select" class="col-md-6 form-control">
                    <?php foreach ($db->query('SELECT * FROM produit WHERE id >= 2 AND id NOT BETWEEN 43 AND 45 ') as $post) { ?>
                         <option value="<?= $post->id ?>"><?= $post->nom ?></option>
                    <?php } ?>
               </select>

               <button type="submit" class="btn btn-primary">Validez</button>
          </form>

          <?php if(array_key_exists('errors', $_SESSION)){ ?>
               <div class="alert alert-danger">
                    <?= implode ('<br>', $_SESSION['errors']); ?>
               </div>
          <?php }

          if(array_key_exists('success', $_SESSION)){ ?>
               <div class="alert alert-success">
                    Modification réussie
               </div>
          <?php }

          if(isset($_POST['prods'])){
               $req = $db->prepare('SELECT * FROM produit WHERE id = :id');
               $req->execute([
                    ':id' => $_POST['prods'],
               ]);
               $result = $req->fetchAll(PDO::FETCH_OBJ); ?>

               
               <form action="admin/PostAdminModify.php" class="col-md-6" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $result['0']->id ?>">     

                    <?= $form->text('Nom', 'Nom :', $result['0']->nom); ?>

                    <?= $form->number('Prix', 'Prix :', $result['0']->prix); ?>

                    <label for="image">Image : Extensions d'images autorisées ('jpg', 'jpeg', 'png')</label>
                    <input class="form-control" type="file" name="image"> <br>
                    
                    <p class="boldText">Image actuelle :</p>
                    <img class="imgHome" src="<?= $result['0']->images ?>" alt=""> <br>

                    <label for="Categorie">Categorie de produit :</label>
                    <p class="boldText">Ne rien mettre si pas de catégorie approprié, "Saveurs / Sushi Maki" = produits qui sont affichés
                    dans la catégorie Saveurs de la page Formule et dans la catégorie Sushi Maki</p>
                    <select name="categorie" id="cate-select" class="col-md-6 form-control">
                         <option value="<?= $result['0']->categorie ?>"><?= $result['0']->categorie ?></option>
                         <?php $req = $db->prepare('SELECT DISTINCT categorie FROM produit WHERE categorie <> :currentCat');  // REQUETE PREPARER POUR EVITER LE DOUBLE AFFICHAGE 
                         $req->execute([                                                                                      // DE LA CATEGORIE CORRESPONDANTE AU PRODUIT //
                              ':currentCat' => $result['0']->categorie,                                                       // ET POUR AVOIR LA BONNE CATEGORIE AFFICHEE PAR DEFAUT
                         ]);
                         $render = $req->fetchAll(PDO::FETCH_OBJ);
                         foreach ($render as $rend) { ?>
                              <option value="<?= $rend->categorie ?>"><?= $rend->categorie ?></option>
                         <?php } ?>
                    </select> <br>


                    <p class="boldText">RAJOUTER &lt;br&gt; a la fin de chaque ligne pour un affichage optimal !!!</p>
                    <?= $form->textarea('Desc', 'Description du produit :', $result['0']->Description) ?>


                    <button type="submit" class="btn btn-primary">Modifier le produit</button>
               </form>

          <?php } 
          unset($_SESSION['errors']);
          unset($_SESSION['success']);
          ?>

     </div>

<?php } else {
     header('location: index.php');
}