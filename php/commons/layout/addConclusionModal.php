<div id="add-conclusion-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Nuova conclusione</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <div class="modal-body">
        <form id="add-conclusion-form"><!--not specify method="post" action="/fishesdiagnosis/php/commons/pages/viewReportPage.php" since submitting is done through js-->
          <input type="hidden" name="request" value="add"/>
          <input type="hidden" name="subject" value="conclusion"/>

          <fieldset class="form-group">
            <label for="risposta">risposta</label>
            <textarea class="form-control" id="risposta"></textarea>
          </fieldset>
          <fieldset class="form-group">
            <label for="evoluzione">evoluzione</label>
            <textarea class="form-control" id="evoluzione"></textarea>
          </fieldset>
        </form>
      </div><!--modal body--->
      <div class="modal-footer"><!--attribute form is used to reference form, since button is out of it-->
        <button form="add-conclusion-form" id="confirm-add-conclusion-button" class="btn btn-secondary">Conferma</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
      </div>
    </div><!--modal-content-->
</div><!--modal dialog-->
</div><!
