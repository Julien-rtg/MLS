<?php require_once 'controler/Backend.class.php'; 
$ad = new Admin();
?>
<!doctype html>
<html lang="fr">
     <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>My Lovely Sushi</title>

          <!-- Required meta tags -->
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

          <meta name="description" content="My lovely sushi vous propose des plats cambodgiens et japonais. Découvrez nos sushi, maki, nem ou encore nos maxi box et nos formules.">
          
          <!-- Bootstrap CSS --> 
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
          
          <link rel="stylesheet" media="screen" type="text/css" href="style/style.css">
          <link rel="icon" type="image/ico" href="img/favicon.ico"/>

          <script src="https://www.google.com/recaptcha/api.js?render=6LepjK4ZAAAAAC18mr5oWhlhOqxiNDaDQkzOcdFC"></script>
          
     </head>
     <body>

          <div class="pos-f-t">
               <nav class="navbar navbar-dark bg-dark">
                    <a class="navbar-brand" href="index.php" id="colorTitleTop">My Lovely Sushi</a>
                    <div class="navbar-right">
                         <!-- <a href="index.php?finalPanier">
BUTTON PANIER        <svg class="bi bi-cart4 " width="2em" height="2em" viewBox="0 0 16 16" fill="white" xmlns="http://www.w3.org/2000/svg"> 
                              <path fill-rule="evenodd" d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                         </svg>
                         </a> -->
                         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                              <span class="navbar-toggler-icon"></span>
                         </button>
                    </div>
               </nav>
               <div class="collapse" id="navbarToggleExternalContent">
                    <div class="bg-dark p-4">
                         <p class="text-white"><a href="index.php?TousLesProduits">Tous les produits</a></p>
                         <p class="text-white"><a href="index.php?finalPanier">Panier</a></p>
                         <p class="text-white"><a href="index.php?Contact">Contact</a></p>
                         <p class="text-white"><a href="index.php?NousSituer">Nous situer</a></p>
                         <p class="text-white"><a href="index.php?MonCompte">Espace Admin</a></p>
                         <?php $ad->display(); ?>
                    </div>
               </div>
          </div>