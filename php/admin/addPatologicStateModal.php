<!--Modal for inserting new patologic state-->
<script src="/fishesdiagnosis/js/admin/addPatologicStateModal.js"></script>

<div id="add-pat-st-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Nuovo stato patologico</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <div class="modal-body">
        <form id="add-pat-st-form">
          <input type="hidden" name="request" value="add"/>
          <input type="hidden" name="subject" value="generalInfo"/>


            <fieldset class="form-group">
              <label for="nomeStato">Nome</label>
              <input type="text" class="form-control nome" name="nomeStato" id="nomeStato" required>


                <label for="tipoStato">Tipologia</label>
                <select class="form-control" name="tipoStato" id="tipoStato" style="display: inline-block"><!--i could have used 2 radios-->
                  <option value="infezione" selected>infezione</option>
                  <option value="virus">virus</option>
                </select>

            </fieldset>
          </form>
          </div><!--modal body--->
      <div class="modal-footer">
        <button type="button" id="confirm-add-pat-st-button" class="btn btn-secondary">Conferma inserimento stato patologico</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
      </div>
    </div><!--modal-content-->
</div><!--modal dialog-->
</div><!--modal-->
