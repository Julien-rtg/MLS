<?php $form = new Form(isset($_SESSION['inputs']) ? $_SESSION['inputs'] : []); ?>

<div class="mainBlocCompte">

     <div class="containerCompte">

          <?php if(array_key_exists('errors', $_SESSION)){ ?>
               <div class="alert alert-danger">
                    <?= implode('<br/>', $_SESSION['errors']); ?>
               </div>
          <?php } ?>

          <?php if(array_key_exists('success', $_SESSION)){ ?>
               <div class="alert alert-success">
                    Vous êtes connecté
               </div>
          <?php } ?>

          <?php if(array_key_exists('successDisconnect', $_SESSION)){ ?>
               <div class="alert alert-success">
                    Déconnection réussie
               </div>
          <?php } ?>

          <div class="formCompte">
               <form action="post/postConnection.php" method="POST" id="idCompte">
                    <div class="col-md-12">
                         <?= $form->email('email', 'Votre login', ''); ?>
                    </div>

                    <div class="col-md-12">
                         <?= $form->password('password', 'Mot de passe', ''); ?>
                    </div>

                    <div class="col-md-12">
                         <button type="submit" class="btn btn-primary btn-lg col-md-12" >Se connecter</button>
                    </div>

                    <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
               </form>
          </div>

          <div class="col-md-12">
               <a href="index.php?NewCompte" class="btn btn-primary btn-lg col-md-12">Inscrivez vous</a>
          </div>
               <br>

          <form action="post/disconnect.php">
               <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-lg col-md-12">Se déconnecter</button>
               </div>
          </form>


     </div>
</div>

<?php

unset($_SESSION['errors']);
unset($_SESSION['inputs']);
unset($_SESSION['success']);
unset($_SESSION['emailError']);
unset($_SESSION['passwordError']);
unset($_SESSION['successDisconnect']);