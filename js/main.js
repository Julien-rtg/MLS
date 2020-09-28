(function($){ // PREVENT DEFAULT ET PERMET D'ENVOYER LES INFORMATIONS
     $('.addPanier').click(function(event){
          event.preventDefault();
          $.get($(this).attr('href'),{});
     });
})(jQuery);


retour = document.getElementsByClassName("addPanier"); // DISPLAY ALERT ADD PANIER
for (var i = 0; i < retour.length; i++){
     retour[i].addEventListener("click", function(){
          Swal.fire(
               '',
               'Produit ajouté au panier',
               'success'
             );
     });
}