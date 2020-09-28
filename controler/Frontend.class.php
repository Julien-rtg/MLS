<?php

class Frontend {

     public static function run() {
          if (isset($_GET ['TousLesProduits'])){
               require_once ('view/tousLesProduits.php');
          }
          else if (isset($_GET ['Panier'])){
               require_once ('view/panier.php'); 
          }
          else if (isset($_GET ['finalPanier'])){
               require_once ('view/finalPanier.php'); 
          }

          else if (isset($_GET ['MonCompte'])){
               require_once ('view/monCompte.php');
          }
          else if (isset($_GET ['NewCompte'])){
               require_once ('view/newCompte.php');
          }

          else if (isset($_GET['Admin'])){
               require_once ('admin/Admin.php');
          }
          else if (isset($_GET['AdminModify'])){
               require_once ('admin/AdminModify.php');
          }
          else if(isset($_GET['AdminSuppr'])){
               require_once ('admin/AdminSuppr.php');
          }
          else if(isset($_GET['AdminAdd'])){
               require_once ('admin/AdminAdd.php');
          }

          else if (isset($_GET ['Contact'])){
               require_once ('view/contact.php');
          }
          else if (isset($_GET ['NousSituer'])){
               require_once ('view/nousSituer.php');
          }
          else if (isset($_GET['Mentions'])){
               require_once ('view/mentions.php');
          }
          else {
               require_once ('view/homeView.php');
          }
     }
}




?>