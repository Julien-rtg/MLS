<?php $db = new Database(); ?> 
<?php $panier = new Panier($db);

if(isset($_GET['id'])){
     $product = $db->queryArray('SELECT id FROM produit WHERE id=:id', array('id' => $_GET['id']));
     if(empty($product)){
          die( "Ce produit n'existe pas");
     } else {
          $panier->add($product[0]->id);
     }

}else {
     die("Vous n'avez pas sélectionné de produit à ajouter au panier");
}
