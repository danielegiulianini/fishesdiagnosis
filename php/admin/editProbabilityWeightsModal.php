<!--Modal for editing probability weights
dependencies of this file:
1. a variable $conn in the importing file, containing a mysqli connection object
  (superable by using include_once("....connect.php"))

potrei fare con ajax vito che dopo non si carica la pagina -> js file
-->
<?php

$result=$conn->query("SELECT nomeProbabilitaAssociata, valore FROM pesi");
while($row=$result->fetch_assoc()){
  $statiPatologici_assoc[]=$row;
}
$idStatiPatologici = array(); //devo trasformare l'array associativo in array di valori
$nomiStatiPatologici = array();
foreach($statiPatologici_assoc as $item){
  $idStatiPatologici[]=$item["idStatoPat"];
  $nomiStatiPatologici[]=$item["nome"];
}
?>

<script src="/fishesdiagnosis/js/admin/editProbabilityWeightsModal.js"></script>

<div id="edit-general-info-report-modal" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Scheda <span id="e-idScheda">15</span></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <div class="modal-body">
        <form id="edit-general-info-report-form">
          <div class="row">
            <div class="col-md-6">
              <fieldset class="form-group">
                <div class="col-4">
                  <label for="e-idScheda">Id</label>
                  <input type="text" class="form-control nome" name="e-idScheda" id="e-idScheda" readonly>
                </div>
                <div class="form-row">
                  <div class="col-6">
                    <label for="e-stato">Stato</label>
                    <input type="text" class="form-control nome" name="nomeRichiedente" id="e-stato" required>
                  </div>
                  <div class="col-2">
                    <label for="e-sigla-provincia">Sigla provincia</label>
                    <input type="text" class="form-control nome" name="telefonoRichiedente" id="e-sigla-provincia">
                  </div>
                </div>
                <label for="e-nomeRichiedente">nome richiedente</label>
                <input type="text" class="form-control nome" name="nomeRichiedente" id="e-nomeRichiedente" required>
                <label for="e-telefonoRichiedente">telefono richiedente</label>
                <input type="text" class="form-control nome" name="telefonoRichiedente" id="e-telefonoRichiedente">
                <label for="e-emailRichiedente">email richiedente</label>
                <input type="text" class="form-control nome" name="emailRichiedente" id="e-emailRichiedente">
                <label for="e-nomeVeterinario">nome veterinario</label>
                <input type="text" class="form-control nome" name="nomeVeterinario" id="e-nomeVeterinario">
              </fieldset>

          </div><!--1° col-md-6-->
          <div class="col-md-6">
            <fieldset class="form-group">
              <div class="form-row">
                <div class="col-4 col-md-4">
                  <label for="e-numeroAffetti">num. affetti</label>
                  <input type="number" min="0" class="form-control" id="e-numeroAffetti" placeholder="25" name="numeroAffetti">
                </div>
                <div class="col-4 col-md-4">
                  <label for="e-numeroEsaminati">num. esaminati</label>
                  <input type="number" class="form-control" id="e-numeroEsaminati" placeholder="50" name="numeroEsaminati">
                </div>
                <div class="col-4 col-md-4">
                  <label for="e-percentualeAffetti">perc. affetti</label>
                  <input type="number" min="0" max=100 class="form-control" id="e-percentualeAffetti" placeholder="25" name="numeroAffetti" required>
                </div>
              </div>

              <div class="form-row">
                <div class="col-3 col-md-3">
                  <label for="e-taglia">taglia(cm)</label>
                  <input type="number" class="form-control" id="e-taglia" placeholder="15">
                </div>
                <div class="col-3 col-md-3">
                  <label for="e-specie">specie</label>
                  <select class="form-control specie" name="specie" id="e-specie" style="display: inline-block" required>
                    <?php
                      for ($i=0; $i<count($specie); $i++){
                          echo '<option>'.$specie[$i].'</option>';
                      }
                    ?>
                  </select>
                  </div>
                  <div class="col-3 col-md-3">
                    <label for="e-sesso">sesso</label>
                    <input type="number" class="form-control" name="sesso" id="e-sesso" placeholder="maschio">
                  </div>
                  <div class="col-3 col-md-3">
                    <label for="e-eta">eta(mesi)</label>
                    <input type="number" class="form-control" name="eta" id="e-eta" placeholder="11">
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-12 col-md-4">
                    <label for="e-vasca">vasca</label>
                    <input type="number" class="form-control" id="e-vasca" name="vasca" placeholder="vasca1">
                  </div>
                  <div class="col-6 col-md-4">
                    <label for="e-origine">origine</label>
                    <select class="form-control" name="origine" id="e-origine" style="display: inline-block">
                      <?php
                        for ($i=0; $i<count($specie); $i++){
                            echo '<option>'.$specie[$i].'</option>';
                        }
                      ?>
                    </select>
                    </div>
                    <div class="col-6 col-md-4">
                      <label for="e-sospetto">sospetto</label>
                      <input type="text" class="form-control" id="e-sospetto" name="sospetto" placeholder="KVD">
                    </div>
                  </div>

                  <div class="form-row">
                    <label for="e-note">note</label>
                    <textarea class="form-control" rows="3"  name="note" id="e-note"></textarea>
                  </div>
            </fieldset>
          </div>
            </div><!--row-->
          </div><!--modal body--->
      </form>
      <div class="modal-footer">
        <button type="button" id="confirm-edit-general-info-report-button" class="btn btn-secondary">Conferma inserimento nuova scheda</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
      </div>
    </div><!--modal-content-->
  </div><!--modal dialog-->
</div><!--modal-->
