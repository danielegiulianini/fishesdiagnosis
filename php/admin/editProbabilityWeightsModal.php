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

foreach($pesi_assoc as $item){
  echo
  '<div class="form-row">
    <div class="col-8">
      <label for="e-nomeProbabilita">'.$pesi_assoc["nomeProbabilitaAssociata"].'</label>
      <input type="text" class="form-control nome" name="nomeProbabilita" id="e-nomeProbabilita" required>
    </div>
    <div class="col-4">
      <label for="e-valore">'.$pesi_assoc["valore"].'</label>
      <input type="text" class="form-control nome" name="valore" id="e-valore">
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

<div id="edit-probability-weights-modal" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Scheda <span id="e-idScheda">15</span></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <?php echo $weightsForm; ?>
          
        </div><!--modal body--->
        <div class="modal-footer">
          <button type="button" id="confirm-edit-probability-weights-button" class="btn btn-secondary">Conferma modifica</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
        </div>
      </div><!--modal-content-->
    </div><!--modal dialog-->
  </div><!--modal-->