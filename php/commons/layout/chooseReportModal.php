<!--dependencies of this file:
a variable $conn containing a mysqli connection
-->

<?php
/*
da decommentare quando dati pronti e sostituire l'array specie nel select sotto con l'array idSchede:

$stmt=$conn->prepare("SELECT idScheda FROM schedechiamate where schedechiamate.idUtente = ?");
$stmt->bind_param("i", $IDUtente);
$stmt->execute();
$result=$stmt->get_result();
while($row=$result->fetch_assoc()){
  $idSchede_assoc[]=$row;
}
$idSchede=array(); //devo trasformare l'array associativo in array di valori
foreach($idSchede_assoc as $item){
  $idSchede[]=$item["idScheda"];
}
*/
?>

<!--
no need of js (bootstrap validation here is not required.)
<script src="/fishesdiagnosis/js/commons/insertReportGeneralInfoModal.js"></script>-->

<div id="choose-report-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Scegli scheda chiamata</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <div class="modal-body">
        <form id="choose-pat-st-form" action="get" method="/fishesdiagnosis/php/commons/pages/viewReportPage.php">
            <fieldset class="form-group">
                  <label for="idScheda">scheda:</label>
                  <select class="form-control" name="idScheda" id="idScheda" style="display: inline-block" required>
                    <?php
                      for ($i=0; $i<count($specie); $i++){
                          echo '<option>'.$specie[$i].'</option>';
                      }
                    ?>
                  </select>
            </fieldset>
          </form>
          </div><!--modal body--->
      <div class="modal-footer">
        <button type="button" id="confirm-choose-report-button" class="btn btn-secondary">Conferma</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
      </div>
    </div><!--modal-content-->
</div><!--modal dialog-->
</div><!--modal-->
