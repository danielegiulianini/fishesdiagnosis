<!--Modal for inserting new patologic state-->
<script src="/fishesdiagnosis/js/commons/addPatologicStateModal.js"></script>

<div id="add-pat-st-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Nuovo stato patologico</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <div class="modal-body">
        <form id="add-pat-st-form">
            <fieldset class="form-group">
              <label for="nomeStato">Nome</label>
              <input type="text" class="form-control nome" name="nomeStato" id="nomeStato" required>

              <div class="col-6 col-md-4">
                <label for="tipoStato">Tipologia</label>
                <select class="form-control" name="tipoStato" id="tipoStato" style="display: inline-block">
                  <?php
                    for ($i=0; $i<count($specie); $i++){
                        echo '<option>'.$specie[$i].'</option>';
                    }
                  ?>
                </select>
              </div>
            </fieldset>
          </form>
          </div><!--modal body--->
      <div class="modal-footer">
        <button type="button" id="confirm-add-button" class="btn btn-secondary">Conferma inserimento nuova scheda</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
      </div>
    </div><!--modal-content-->
</div><!--modal dialog-->
</div><!--modal-->
