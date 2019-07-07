<!--dependencies of this file:
a variable $conn containing a mysqli connection
-->
<?php

$idLuoghi_assoc = array();

$stmt=$conn->prepare("SELECT idLuogo FROM luoghi");
$stmt->execute();
$result=$stmt->get_result();
while($row=$result->fetch_assoc()){
  $idLuoghi_assoc[]=$row;
}
$idLuoghi=array(); //devo trasformare l'array associativo in array di valori
foreach($idLuoghi_assoc as $item){
  $idLuoghi[]=$item["nome"];
}


$nomiTipiEventi_assoc = array();

$stmt=$conn->prepare("SELECT nome FROM tipieventi");
$stmt->execute();
$result=$stmt->get_result();
while($row=$result->fetch_assoc()){
  $nomiTipiEventi_assoc[]=$row;
}
$nomiTipiEventi=array(); //devo trasformare l'array associativo in array di valori
foreach($nomiTipiEventi_assoc as $item){
  $nomiTipiEventi[]=$item["nome"];
}

?>

<div id="add-event-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Nuovo evento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <div class="modal-body">
        <form id="add-event-form" method="get" action="/fishesdiagnosis/php/commons/pages/viewReportPage.php">
          <fieldset class="form-group">
            <div class="form-row">
              <div class="col-6">
                <label for="dataEvento">data evento</label>
                <input type="date" class="form-control" id ="dataEvento" name="dataEvento" required>
              </div>
              <div class="col-6">
                <label for="dataComparsaSegni">data comparsa segni clinici</label>
                <input type="date" class="form-control" id ="dataComparsaSegni" name="dataComparsaSegni" required>
              </div>
            </div>
          </fieldset>

          <fieldset class="form-group">
            <div class="form-row">
              <div class="col-8">
                <label for="tipologia">tipologia</label>

                <select class="form-control" name="tipologia" id="tipologia" required>
                  <?php
                    for ($i=0; $i<count($nomiTipiEventi); $i++){
                        echo '<option>'.$nomiTipiEventi[$i].'</option>';
                    }
                  ?>
                </select>
              </div>
              <div class="col-4">
                <label for="provenienza">provenienza</label>

                <select class="form-control" name="provenienza" id="provenienza">
                  <?php
                    for ($i=0; $i<count($idLuoghi); $i++){
                        echo '<option>'.$idLuoghi[$i].'</option>';
                    }
                  ?>
                </select>
              </div>
            </div>
          </fieldset>

          <fieldset class="form-group">
            <label for="note">note</label>
            <textarea class="form-control" id="note"></textarea>
          </fieldset>
        </form>
      </div><!--modal body--->
      <div class="modal-footer"><!--attribute form is used to reference form, since button is out of it-->
        <button type="submit"  form="add-event-form" id="confirm-add-event-button" class="btn btn-secondary">Conferma</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
      </div>
    </div><!--modal-content-->
</div><!--modal dialog-->
</div><!
