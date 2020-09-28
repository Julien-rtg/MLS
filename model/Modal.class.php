<?php

class Modal {

     public function addModal($id, $nom, $description, $img) {
          return '<div class="modal fade" id="exampleModal' . $id . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> <!-- #exampleModal = DYNAMIC MODAL -->
               <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                         <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">' . $nom . '</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                              </button>
                         </div>
                         <div class="modal-body">
                              <img class="imgModal" src="'. $img .'" alt=""> <br> ' . $description . '
                         </div>
                    </div>
               </div>
          </div>';
     }
}