<!--dependencies of this file:
1. a variable $conn containing a mysqli connection
2. a session already started
-->

<?php
$stmt = null;
if ($_SESSION["tipoUtente"]=="admin"){  //admin can see and edit all the reports
  $stmt=$conn->prepare("SELECT idScheda FROM schedechiamate");
} else {
  $stmt=$conn->prepare("SELECT idScheda FROM schedechiamate where schedechiamate.idUtente = ?");
  $stmt->bind_param("i", $_SESSION["idUtente"]);
}

$stmt->execute();
$result=$stmt->get_result();
while($row=$result->fetch_assoc()){
  $idSchede_assoc[]=$row;
}
$idSchede=array(); //devo trasformare l'array associativo in array di valori

if(isset($idSchede_assoc)){
  foreach($idSchede_assoc as $item){
    $idSchede[]=$item["idScheda"];
  }
}
?>

<!--
no need of js (bootstrap validation here is not required.)
<script src="/fishesdiagnosis/js/commons/chooseReportModal.js"></script>-->

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
        <form id="choose-report-form" method="get" action="/fishesdiagnosis/php/commons/pages/viewReportPage.php">
            <fieldset class="form-group">
                  <label for="idScheda">scheda:</label>
                  <select class="form-control" name="idScheda" id="idScheda" style="display: inline-block" required>
                    <?php
                      for ($i=0; $i<count($idSchede); $i++){
                          echo '<option>'.$idSchede[$i].'</option>';
                      }
                    ?>
                  </select>
            </fieldset>
          </form>
          </div><!--modal body--->
      <div class="modal-footer"><!--attribute form is used to reference form, since button is out of it-->
        <button type="submit"  form="choose-report-form" id="confirm-choose-report-button" class="btn btn-secondary">Conferma</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
      </div>
    </div><!--modal-content-->
</div><!--modal dialog-->
</div><!--modal-->
