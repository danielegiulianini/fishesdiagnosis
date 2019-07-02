<!--Modal for inserting new data-->

<script src="/fishesdiagnosis/js/commons/addReportModal.js"></script>

<div id="add-report-modal" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Nuova scheda</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <div class="modal-body">
        <form id="add-report-form">
          <div class="row">
            <div class="col-md-6">
              <fieldset class="form-group">
                <label for="nomeRichiedente">nome richiedente</label>
                <input type="text" class="form-control nome" name="nomeRichiedente" id="nomeRichiedente" required>
                <label for="telefonoRichiedente">telefono richiedente</label>
                <input type="text" class="form-control nome" name="telefonoRichiedente" id="telefonoRichiedente">
                <label for="emailRichiedente">email richiedente</label>
                <input type="text" class="form-control nome" name="emailRichiedente" id="emailRichiedente">
                <label for="nomeVeterinario">nome veterinario</label>
                <input type="text" class="form-control nome" name="nomeVeterinario" id="nomeVeterinario">
              </fieldset>

          </div><!--1° col-md-6-->
          <div class="col-md-6">
            <fieldset class="form-group">
              <div class="form-row">
                <div class="col-4 col-md-4">
                  <label for="numeroAffetti">num. affetti</label>
                  <input type="number" min="0" class="form-control" id="numeroAffetti" placeholder="25" name="numeroAffetti">
                </div>
                <div class="col-4 col-md-4">
                  <label for="numeroEsaminati">num. esaminati</label>
                  <input type="number" class="form-control" id="numeroEsaminati" placeholder="50" name="numeroEsaminati">
                </div>
                <div class="col-4 col-md-4">
                  <label for="numeroAffetti">perc. affetti</label>
                  <input type="number" min="0" max=100 class="form-control" id="numeroAffetti" placeholder="25" name="numeroAffetti" required>
                </div>
              </div>

              <div class="form-row">
                <div class="col-3 col-md-3">
                  <label for="taglia">taglia(cm)</label>
                  <input type="number" class="form-control" id="taglia" placeholder="15">
                </div>
                <div class="col-3 col-md-3">
                  <label for="specie">specie</label>
                  <select class="form-control specie" name="specie" id="specie" style="display: inline-block" required>
                    <?php
                      for ($i=0; $i<count($specie); $i++){
                          echo '<option>'.$specie[$i].'</option>';
                      }
                    ?>
                  </select>
                  </div>
                  <div class="col-3 col-md-3">
                    <label for="sesso">sesso</label>
                    <input type="number" class="form-control" name="sesso" id="sesso" placeholder="maschio">
                  </div>
                  <div class="col-3 col-md-3">
                    <label for="eta">eta(mesi)</label>
                    <input type="number" class="form-control" name="eta" id="eta" placeholder="11">
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-12 col-md-4">
                    <label for="vasca">vasca</label>
                    <input type="number" class="form-control" id="vasca" name="vasca" placeholder="vasca1">
                  </div>
                  <div class="col-6 col-md-4">
                    <label for="origine">origine</label>
                    <select class="form-control categoria" name="origine" id="origine" style="display: inline-block">
                      <?php
                        for ($i=0; $i<count($specie); $i++){
                            echo '<option>'.$specie[$i].'</option>';
                        }
                      ?>
                    </select>
                    </div>
                    <div class="col-6 col-md-4">
                      <label for="sospetto">sospetto</label>
                      <input type="text" class="form-control" id="sospetto" name="sospetto" placeholder="KVD">
                    </div>
                  </div>

                  <div class="form-row">
                    <label for="i-ingredienti">note</label>
                    <textarea class="form-control ingredienti" rows="3"  name="ingredienti" id="i-ingredienti"></textarea>
                  </div>
            </fieldset>
          </div>
            </div><!--row-->
          </div><!--modal body--->
      </form>
      <div class="modal-footer">
        <button type="button" id="confirm-add-button" class="btn btn-secondary">Conferma inserimento nuova scheda</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
      </div>
    </div><!--modal-content-->
</div><!--modal dialog-->
</div><!--modal-->
