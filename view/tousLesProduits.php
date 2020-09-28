<?php $db = new Database(); ?>
<?php $modal = new Modal(); ?>
<?php $cateProd = new Category(); ?> 


<div class="mainBlocProd">
     <div class="leftBloc">
          <div class="category">
               <a href="index.php?TousLesProduits">A la carte</a>
               <a href="<?= $cateProd->getCategory(); ?>">Maxi Box</a>
               <a href="<?= $cateProd->getCategory2(); ?>">Formules</a>
               <a href="<?= $cateProd->getCategory3(); ?>">Sushi / Maki</a>
               <a href="<?= $cateProd->getCategory4(); ?>">Accompagnements</a>
               <a href="<?= $cateProd->getCategory5(); ?>">Plats Cambodgien</a>
               <a href="<?= $cateProd->getCategory6(); ?>">Hors d'oeuvre</a>
          </div>
     </div>


     <div class="rightBloc">

          <?php if (isset ($_GET ['id'])) {
                    $_GET['id'] = (int) $_GET['id']; // FORCE LA CONVERSION EN VARIABLE DE TYPE ENTIER
                    if($_GET['id'] == 8) { // MAXI BOX
                         ?>
                         <h5 class="titleGridProduct">2 choix d'accompagnements inclus dans la Box</h5>
                         <?php
                         foreach ($db->query('SELECT * FROM produit WHERE categorie = "Maxi Box"') as $post){ ?>
                              <div class="article">
                                   <div class="openModal" data-toggle="modal" data-target="#exampleModal<?= $post->id?>"> <!-- #exampleModal = DYNAMIC MODAL -->
                                        <img class="imgHome" src="<?= $post->images?>" alt=""> <br>
                                        <p class="textBold"><?= $post->nom?></p>
                                        <p><?= $post->prix?>€</p> <br>
                                        <p class="infoTxt">Details du produit</p>
                                   </div>
                                   <a class="addPanier btn btn-primary" href="index.php?Panier&id=<?= $post->id; ?>">Précommander</a>
                              </div>
                    
                         <!-- DYNAMIC MODAL FOR PRODUCT -->
                         <?= $modal->addModal($post->id, $post->nom, $post->Description, $post->images); ?>
                         <?php } ?>

                         <h2 class="titleGridProduct">Nos accompagnements :</h2>

                         <?php foreach ($db->query('SELECT * FROM produit WHERE categorie = "Accompagnements"') as $post) { ?>
                              <div class="article">
                                   <div class="openModal" data-toggle="modal" data-target="#exampleModal<?= $post->id?>"> <!-- #exampleModal = DYNAMIC MODAL -->
                                        <img class="imgHome" src="<?= $post->images?>" alt=""> <br>
                                        <p class="textBold"><?= $post->nom?></p> <br>
                                   </div>
                              </div>
                         <?= $modal->addModal($post->id, $post->nom, $post->Description, $post->images); ?>
                         <?php }

                    } else if ($_GET['id'] == 9) { // FORMULES
                         ?>
                         <h5 class="titleGridProduct">2 choix d'accompagnements inclus dans la Formule</h5>
                         <?php
                         foreach ($db->query('SELECT * FROM produit WHERE categorie = "Formules"') as $post){ ?>
                              <div class="article">
                                   <div class="openModal" data-toggle="modal" data-target="#exampleModal<?= $post->id?>"> <!-- #exampleModal = DYNAMIC MODAL -->
                                        <img class="imgHome" src="<?= $post->images?>" alt=""> <br>
                                        <p class="textBold"><?= $post->nom?></p>
                                        <p><?= $post->prix?>€</p> <br>
                                        <p class="infoTxt">Details du produit</p>
                                   </div>
                                   <a class="addPanier btn btn-primary" href="index.php?Panier&id=<?= $post->id; ?>">Précommander</a>
                              </div>

                              <!-- DYNAMIC MODAL FOR PRODUCT -->
                              <?= $modal->addModal($post->id, $post->nom, $post->Description, $post->images); ?>
                         <?php } ?>
                         
                         <br>
                         <h2 class="titleGridProduct">Nos saveurs :</h2>

                         <?php foreach ($db->query('SELECT * FROM produit WHERE categorie LIKE "Saveurs%"') as $post) { ?>
                              <div class="article">
                                   <div class="openModal" data-toggle="modal" data-target="#exampleModal<?= $post->id?>"> <!-- #exampleModal = DYNAMIC MODAL -->
                                        <img class="imgHome" src="<?= $post->images?>" alt=""> <br>
                                        <p class="textBold"><?= $post->nom?></p> <br>
                                   </div>
                              </div>
                              <?= $modal->addModal($post->id, $post->nom, $post->Description, $post->images); ?>
                         <?php } ?>

                         <h2 class="titleGridProduct">Nos accompagnements :</h2>

                         <?php foreach ($db->query('SELECT * FROM produit WHERE categorie = "Accompagnements"') as $post) { ?>
                              <div class="article">
                                   <div class="openModal" data-toggle="modal" data-target="#exampleModal<?= $post->id?>"> <!-- #exampleModal = DYNAMIC MODAL -->
                                        <img class="imgHome" src="<?= $post->images?>" alt=""> <br>
                                        <p class="textBold"><?= $post->nom?></p> <br>
                                   </div>
                              </div>
                         <?= $modal->addModal($post->id, $post->nom, $post->Description, $post->images); ?>
                         <?php }

                    } else if ($_GET['id'] == 10) { // SUSHI / MAKI
                    foreach ($db->query('SELECT * FROM produit WHERE categorie LIKE "%Sushi Maki"') as $post){ ?>
                         <div class="article">
                              <div class="openModal" data-toggle="modal" data-target="#exampleModal<?= $post->id?>"> <!-- #exampleModal = DYNAMIC MODAL -->
                                   <img class="imgHome" src="<?= $post->images?>" alt=""> <br>
                                   <p class="textBold"><?= $post->nom?></p>
                                   <p><?= $post->prix?>€</p> <br>
                                   <p class="infoTxt">Details du produit</p>
                              </div>
                              <a class="addPanier btn btn-primary" href="index.php?Panier&id=<?= $post->id; ?>">Précommander</a>
                         </div>
               
                         <!-- DYNAMIC MODAL FOR PRODUCT -->
                         <?= $modal->addModal($post->id, $post->nom, $post->Description, $post->images); ?>
                         <?php }

                    } else if ($_GET['id'] == 11) { // ACCOMPAGNEMENTS
                         foreach ($db->query('SELECT * FROM produit WHERE categorie = "Accompagnements"') as $post){ ?>
                              <div class="article">
                                   <div class="openModal" data-toggle="modal" data-target="#exampleModal<?= $post->id?>"> <!-- #exampleModal = DYNAMIC MODAL -->
                                        <img class="imgHome" src="<?= $post->images?>" alt=""> <br>
                                        <p class="textBold"><?= $post->nom?></p>
                                        <p><?= $post->prix?>€</p> <br>
                                        <p class="infoTxt">Details du produit</p>
                                   </div>
                                   <a class="addPanier btn btn-primary" href="index.php?Panier&id=<?= $post->id; ?>">Précommander</a>
                              </div>
                    
                         <!-- DYNAMIC MODAL FOR PRODUCT -->
                         <?= $modal->addModal($post->id, $post->nom, $post->Description, $post->images); ?>
                         <?php }
                    
                    } else if ($_GET['id'] == 12) { // PLATS CAMBODGIEN
                         foreach ($db->query('SELECT * FROM produit WHERE categorie = "Plats Cambodgiens"') as $post){ ?>
                              <div class="article">
                                   <div class="openModal" data-toggle="modal" data-target="#exampleModal<?= $post->id?>"> <!-- #exampleModal = DYNAMIC MODAL -->
                                        <img class="imgHome" src="<?= $post->images?>" alt=""> <br>
                                        <p class="textBold"><?= $post->nom?></p>
                                        <p><?= $post->prix?>€</p> <br>
                                        <p class="infoTxt">Details du produit</p>
                                   </div>
                                   <a class="addPanier btn btn-primary" href="index.php?Panier&id=<?= $post->id; ?>">Précommander</a>
                              </div>
                    
                         <!-- DYNAMIC MODAL FOR PRODUCT -->
                         <?= $modal->addModal($post->id, $post->nom, $post->Description, $post->images); ?>
                        <?php }
                    }
                    else if ($_GET['id'] == 13) { // HORS D'OEUVRE
                         foreach ($db->query('SELECT * FROM produit WHERE categorie = "Hors d\'oeuvre"') as $post){ ?>
                              <div class="article">
                                   <div class="openModal" data-toggle="modal" data-target="#exampleModal<?= $post->id?>"> <!-- #exampleModal = DYNAMIC MODAL -->
                                        <img class="imgHome" src="<?= $post->images?>" alt=""> <br>
                                        <p class="textBold"><?= $post->nom?></p>
                                        <p><?= $post->prix?>€</p> <br>
                                        <p class="infoTxt">Details du produit</p>
                                   </div>
                                   <a class="addPanier btn btn-primary" href="index.php?Panier&id=<?= $post->id; ?>">Précommander</a>
                              </div>
                    
                         <!-- DYNAMIC MODAL FOR PRODUCT -->
                         <?= $modal->addModal($post->id, $post->nom, $post->Description, $post->images); ?>
                        <?php }
                    }
                    else { // A LA CARTE
                         foreach ($db->query('SELECT * FROM produit WHERE id IN (2,3,4,5,11,12,13,16,18,23,24,25)') as $post){ 
                              ?>
                              <div class="article">
                                   <div class="openModal" data-toggle="modal" data-target="#exampleModal<?= $post->id?>"> <!-- #exampleModal = DYNAMIC MODAL -->
                                        <img class="imgHome" src="<?= $post->images?>" alt=""> <br>
                                        <p class="textBold"><?= $post->nom?></p>
                                        <p><?= $post->prix?>€</p> <br>
                                        <p class="infoTxt">Details du produit</p>
                                   </div>
                                   <a class="addPanier btn btn-primary" href="index.php?Panier&id=<?= $post->id; ?>">Précommander</a>
                              </div>
          
                              <!-- DYNAMIC MODAL FOR PRODUCT -->
                              <?= $modal->addModal($post->id, $post->nom, $post->Description, $post->images); ?>
                         <?php }
                    }
          } else { // A LA CARTE
               foreach ($db->query('SELECT * FROM produit WHERE id IN (2,3,4,5,11,12,13,16,18,23,24,25)') as $post){ 
                    ?>
                    <div class="article">
                         <div class="openModal" data-toggle="modal" data-target="#exampleModal<?= $post->id?>"> <!-- #exampleModal = DYNAMIC MODAL -->
                              <img class="imgHome" src="<?= $post->images?>" alt=""> <br>
                              <p class="textBold"><?= $post->nom?></p>
                              <p><?= $post->prix?>€</p> <br>
                              <p class="infoTxt">Details du produit</p>
                         </div>
                         <a class="addPanier btn btn-primary" href="index.php?Panier&id=<?= $post->id; ?>">Précommander</a>
                    </div>

                    <!-- DYNAMIC MODAL FOR PRODUCT -->
                    <?= $modal->addModal($post->id, $post->nom, $post->Description, $post->images); ?>
               <?php }
          } ?>
     </div>
</div>