
<!--Modal for inserting new user-->
<script src="/fishesdiagnosis/js/commons/addUserModal.js"></script>

<div id="add-user-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Nuovo utente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <div class="modal-body">
        <div id ="errorsBox" class="alert alert-danger alert-php" role="alert" style="display:none">
          Errore durante l'inserimento.
          <p></p>
        </div>
        <form id="add-user-form">
            <input type="hidden" name="request" value="registration"/>

            <fieldset class="form-group">
              <label for="r_username">Username</label>
              <input type="text" class="form-control nome" name="r_username" id="r_username" required>

              <label for="r_password">Password</label>
              <input type="password" class="form-control password" name="r_password" id="r_password" required>

            </fieldset>
          </form>
          </div><!--modal body--->
      <div class="modal-footer">
        <button type="button" id="confirm-add-user-button" class="btn btn-secondary">Conferma inserimento dati</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
      </div>
    </div><!--modal-content-->
</div><!--modal dialog-->
</div><!--modal-->
