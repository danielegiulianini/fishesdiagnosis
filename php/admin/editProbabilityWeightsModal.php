<!--Modal for editing probability weights
dependencies of this file:
1. a variable $conn in the importing file, containing a mysqli connection object
  (superable by using include_once("....connect.php"))

potrei fare con ajax vito che dopo non si carica la pagina -> js file
-->
<?php

$pesi_assoc=array();
$result=$conn->query("SELECT nomeProbabilitaAssociata, valore FROM pesi");
while($row=$result->fetch_assoc()){
  $pesi_assoc[]=$row;
}

$weightsForm = '';
$weightsForm .= '<form id="edit-probability-weights-form">
                  <fieldset class="form-group">';
$weightsForm.= '<div class="form-row mb-1" aria-role="form-header">
                  <div class="col-8">
                  Nome probabilità
                  </div>
                  <div class="col-4">
                  Valore peso
                  </div>
                </div>';
for($i=0; $i<count($pesi_assoc) ;$i++){
  $weightsForm.=
  '<div class="form-row mb-1">
    <div class="col-8">
      <!--<label for="e-nomeProbabilitaAssociata">'.$pesi_assoc[$i]["nomeProbabilitaAssociata"].'</label>-->
      <input type="text" class="form-control e-nomeProbabilita" name="pesi[][nomeProbabilitaAssociata]" value="'.$pesi_assoc[$i]["nomeProbabilitaAssociata"].'" readonly>
    </div>
    <div class="col-4">
      <!--<label for="e-valore">'.$pesi_assoc[$i]["valore"].'</label>-->
      <input type="number" class="form-control e-valore" name="pesi[][valore]" min="0" max="1" step=".1" required readonly>
    </div>
  </div>';
}
$weightsForm .=   '</fieldset>
                </form>';

/*siccome è già un modale, non posso sovrapporne un altro ->
me la gioco con le disabilitazioni / ailitazioni dei bottoni.
è come l'esame di tecweb, un giochino del genere*/
?>

<script src="/fishesdiagnosis/js/admin/editProbabilityWeightsModal.js"></script>

<div id="edit-probability-weights-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modifica pesi probabilità</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <?php echo $weightsForm; ?>

        </div><!--modal body--->
        <div class="modal-footer">
          <button type="button" id="enable-edit-probability-weights-button" class="btn btn-secondary">Modifica</button>
          <button type="button" id="confirm-edit-probability-weights-button" class="btn btn-secondary" disabled>Conferma modifica</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
        </div>
      </div><!--modal-content-->
    </div><!--modal dialog-->
  </div><!--modal-->
