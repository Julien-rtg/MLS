<?php
declare(strict_types=1);
?>
     
<body>
     
     <?php

     include_once "app/Database.php";

     // LINK BOOTSTRAP + HEADER OF SITE + LINK CSS IN BOOTSTRAP.PHP
     include 'view/bootstrap.php';

     // CONTRLER BACK
     include_once "controler/Backend.class.php";

     // CONTROLER FRONT
     include_once "controler/Frontend.class.php";
     Frontend::run();
     
     // FOOTER
     include_once "view/footer.php";

     unset($_SESSION['inputs']);
     ?>


<!-- BODY END IN FOOTER.PHP -->
