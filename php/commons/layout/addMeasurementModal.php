<!--dependencies of this file:
a variable $conn containing a mysqli connection
-->
<?php
$caratteristicheAcqua_assoc = array();

$stmt=$conn->prepare("SELECT nome, unitaMisura FROM caratteristicheacqua");
$stmt->execute();
$result=$stmt->get_result();
while($row=$result->fetch_assoc()){
  $caratteristicheAcqua_assoc[]=$row;
}
$nomi=array(); //devo trasformare l'array associativo in array di valori
foreach($caratteristicheAcqua_assoc as $item){
  $nomi[]=$item["nome"];
}
?>

<div id="add-measurement-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Nuova misurazione</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <div class="modal-body">
        <form id="add-measurement-form" method="get" action="/fishesdiagnosis/php/commons/pages/viewReportPage.php">
          <fieldset class="form-group">
            <div class="form-row">
              <div class="col-8">
                <label for="idScheda">caratteristica:</label>

                <select class="form-control" name="caratteristicaAcqua" id="caratteristicaAcqua" required>
                  <?php
                    for ($i=0; $i<count($nomi); $i++){
                        echo '<option>'.$nomi[$i].'</option>';
                    }
                  ?>
                </select>
              </div>
              <div class="col-4">
                <label for="valore">valore:</label>
                <input type="number" class="form-control" id ="valore" required>
              </div>
            </div>
          </fieldset>
        </form>
      </div><!--modal body--->
      <div class="modal-footer"><!--attribute form is used to reference form, since button is out of it-->
        <button type="submit"  form="add-measurement-form" id="confirm-add-measurement-button" class="btn btn-secondary">Conferma</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
      </div>
    </div><!--modal-content-->
</div><!--modal dialog-->
</div><!
