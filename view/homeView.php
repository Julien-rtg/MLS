<?php $db = new Database(); ?> 
<?php $cateProd = new Category(); ?> 


<div class="mainBlocHome">
     <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
               <div class="carousel-item active">
                    <img src="img/imageFull1.jpg" class="imageFull" alt="" title="">
                    <img src="img/imageMobile.jpg" class="imageMobile" alt="" title="">
               </div>
          </div>
     </div>

     <div class="botBlocHome">
          <?php foreach ($db->query('SELECT * FROM produit WHERE id = 1') as $post){ ?>
               <div class="article articleHome">
                    <a href="index.php?TousLesProduits" class="textBold"><img class="imgHome" src="<?= $post->images?>" alt=""><br/>A la carte</a> <br/>
               </div>
          <?php } ?>
          <?php foreach ($db->query('SELECT * FROM produit WHERE id = 43') as $post){ ?>
               <div class="article articleHome">
                    <a href="<?= $cateProd->getCategory(); ?>" class="textBold"><img class="imgHome" src="<?= $post->images?>" alt=""><br/> Maxi Box</a> <br/>
               </div>
          <?php } ?>
          <?php foreach ($db->query('SELECT * FROM produit WHERE id = 44') as $post){ ?>
               <div class="article articleHome">
                    <a href="<?= $cateProd->getCategory2(); ?>" class="textBold"><img class="imgHome" src="<?= $post->images?>" alt=""><br/> Formules</a> <br/>
               </div>
          <?php } ?>
          <?php foreach ($db->query('SELECT * FROM produit WHERE id = 45') as $post){ ?>
               <div class="article articleHome">
                    <a href="<?= $cateProd->getCategory3(); ?>" class="textBold"><img class="imgHome" src="<?= $post->images?>" alt=""><br/> Sushi / Maki</a> <br/>
               </div>
          <?php } ?>
     </div>
</div>