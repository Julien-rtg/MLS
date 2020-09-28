<?php $form = new Form(isset($_SESSION['inputs']) ? $_SESSION['inputs'] : []); ?>


<script>
        grecaptcha.ready(function () {
            grecaptcha.execute('', { action: 'contact' }).then(function (token) {
                var recaptchaResponse = document.getElementById('recaptchaResponse');
                recaptchaResponse.value = token;
            });
        });
</script>

<div class="mainBlocContact">
     <h2 class="titleContact">Contact My Lovely Sushi</h2>

     <div class="container">

          <div class="starter-template">

               <?php if(array_key_exists('errors', $_SESSION)){ ?>
                    <div class="alert alert-danger">
                         <?= implode ('<br>', $_SESSION['errors']); ?>
                    </div>
               <?php  } ?>
               <?php if(array_key_exists('success', $_SESSION)){ ?>
                    <div class="alert alert-success">
                         Votre email a bien été envoyé
                    </div>
               <?php  } ?>

               <form action="post/postContact.php" method="POST" id="idForm">
                    <div class="row">
                         <div class="col-md-6">
                              <?= $form->text('name', 'Votre Nom', ''); ?>
                         </div>

                         <div class="col-md-6">
                              <?= $form->email('email', 'Votre Email', ''); ?>
                         </div>

                         <div class="col-md-12">
                              <?= $form->textarea('message', 'Votre message', ''); ?>
                         </div>

                         <div class="btnContact col-md-12">
                              <button type="submit" class="btn btn-primary btn-lg col-md-12" 
                              >Envoyer</button>
                         </div>

                         <input type="hidden" name="recaptcha_response" id="recaptchaResponse">

                    </div>
               </form>
          </div>

     </div>
</div>

                                   
<?php
unset($_SESSION['errors']);
unset($_SESSION['inputs']);
unset($_SESSION['success']);
?>