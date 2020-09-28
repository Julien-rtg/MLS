<?php $db = new Database(); ?>
<?php $panier = new Panier($db); ?>
<?php
if(isset($_GET['del'])){ // APPEL FONCTION DELETE PANIER.CLASS.PHP
     $panier->del($_GET['del']);
}


$ids = array_keys($_SESSION['panier']);

if(empty($ids)) {        
     $products = array();
} else {
     $products = $db->query('SELECT * FROM produit WHERE id IN ('. implode(',',$ids).')');
}

?>

<div class="mainBlocPanier">
     <div class="titre">
          <h3>Commande en ligne non disponible, veuillez appeler à ce numéro pour réaliser votre commande :</h3>
          <h3>09 54 44 86 90</h3> <br>
          <h2>Votre Panier :</h2>
          <p class="total">Grand total :</p>
          <p class="total"><?= number_format($panier->total(),2,',',' '); ?> €</p>
     </div>
     <div class="contentPanier">
          <form class="formPanier" method="POST" action="index.php?finalPanier">

               <?php foreach($products as $product) {  ?>
                    <div class="card mb-3">
                         <div class="row no-gutters">
                              <div class="col-md-4">
                                   <img class="card-img" src="<?= $product->images; ?>" alt="">
                              </div>
                              <div class="col-md-8">
                                   <div class="card-body">
                                        <h5 class="card-title"><?= $product->nom;?></h5>
                                        <p class="card-text"><?= $product->prix;?>€</p>
                                        <p class="card-text">Quantité <input type="number" name="panier[quantity][<?= $product->id; ?>]" value="<?= $_SESSION['panier'][$product->id] ?>"></p>
                                        <a class="btn btn-primary card-text" href="index.php?finalPanier&del=<?= $product->id; ?>">Supprimer</a>
                                   </div>
                              </div>
                         </div>
                    </div>
               <?php } ?>

               <p class="total">Grand total :</p>
               <p class="total"><?= number_format($panier->total(),2,',',' '); ?> €</p>

               <button class="btn btn-primary" type="submit">Recalculer</button>
          </form>
     </div>
</div>
