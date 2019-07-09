<!--Modal for inserting new patologic state-->
<script src="/fishesdiagnosis/js/admin/editPatologicStateModal.js"></script>

<div id="edit-pat-st-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modifica stato patologico</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <div class="modal-body">
        <form id="edit-pat-st-form">
            <input type="hidden" name="request" value="edit"/>
            <input type="hidden" name="subject" value="generalInfo"/>


            <fieldset class="form-group">
              <label for="idStato">Id</label>
              <input type="text" class="form-control nome" name="idStato" id="e-idStato" readonly>

              <label for="nomeStato">Nome</label>
              <input type="text" class="form-control nome" name="nomeStato" id="e-nomeStato" required>

                <label for="tipoStato">Tipologia</label>
                <select class="form-control" name="tipoStato" id="e-tipoStato" style="display: inline-block"><!--i could have used 2 radios-->
                  <option value="infezione" selected>infezione</option>
                  <option value="virus">virus</option>
                </select>

            </fieldset>
          </form>
          </div><!--modal body--->
      <div class="modal-footer">
        <button type="button" id="confirm-edit-pat-st-button" class="btn btn-secondary">Conferma modifica stato patologico</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
      </div>
    </div><!--modal-content-->
</div><!--modal dialog-->
</div><!--modal-->
