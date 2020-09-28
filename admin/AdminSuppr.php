<?php
$db = new Database();
$admin = new Admin();
$admin->getControlAdminLog($db);

if(!isset($_SESSION['errorAdmin'])){ ?>

     <div class="mainBlocAdmin">

     <form action="index.php?AdminSuppr" method="POST">

          <label for="prod-select">Choisissez un Produit a SUPPRIMER :</label>

          <select name="prods" id="prod-select" class="col-md-6 form-control">
               <?php foreach ($db->query('SELECT * FROM produit WHERE id >= 2 AND categorie <> "" ') as $post) { ?>
                    <option value="<?= $post->id ?>"><?= $post->nom ?></option>
               <?php } ?>
          </select>

          <button type="submit" class="btn btn-danger">Validez</button>
     </form>

     <?php if(array_key_exists('errors', $_SESSION)){ ?>
               <div class="alert alert-danger">
                    <?= implode ('<br>', $_SESSION['errors']); ?>
               </div>
          <?php }

          if(array_key_exists('success', $_SESSION)){ ?>
               <div class="alert alert-success">
                    Suppression réussie
               </div>
          <?php }

     if(isset($_POST['prods'])){
          $req = $db->prepare('SELECT * FROM produit WHERE id = :id');
          $req->execute([
               ':id' => $_POST['prods'],
          ]);
          $result = $req->fetchAll(PDO::FETCH_OBJ);
          $result = $result['0']; ?>
          
          <form action="admin/PostAdminSuppr.php" method="POST">
               <input type="hidden" name="id" value="<?= $result->id ?>"> 

               <div class="products">
                    <h3>Nom du produit :</h3>
                    <p><?= $result->nom ?></p>
               </div>
               <div class="products">
                    <h3>Prix du produit :</h3>
                    <p><?= $result->prix ?></p>
               </div>
               <div class="products">
                    <img class="imgHome" src="<?= $result->images ?>" alt="">
               </div>
               <div class="products">
                    <h3>Categorie du produit :</h3>
                    <p><?= $result->categorie ?></p>
               </div>
               <div class="products">
                    <h3>Description du produit :</h3>
                    <p><?= $result->Description ?></p>
               </div>

               <button class="btn btn-danger">SUPPRIMER LE PRODUIT</button>
          </form>
          
     <?php } ?>
     </div>


<?php } else {
     header('location: index.php');
}

unset($_SESSION['errors']);
unset($_SESSION['success']);