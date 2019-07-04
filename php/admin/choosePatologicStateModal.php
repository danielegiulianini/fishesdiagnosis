<!--dependencies of this file:
a variable $conn containing a mysqli connection
-->

<?php

/*user is more familiar with statoPatologico nome but php file needs its id.
I need js file to update id after user selects name.*/

$stmt=$conn->prepare("SELECT idStatoPat, nome FROM statipatologici");
$stmt->execute();
$result=$stmt->get_result();
while($row=$result->fetch_assoc()){
  $idStatiPatologici_assoc[]=$row;
}
$idStatiPatologici = array(); //devo trasformare l'array associativo in array di valori
$nomiStatiPatologici = array();
foreach($statiPatologici_assoc as $item){
  $idStatiPatologici[]=$item["idStatoPat"];
  $nomiStatiPatologici[]=$item["nome"];
}

$idStatiPatologiciJson = json_encode($idStatiPatologici);
$nomiStatiPatologiciJson = json_encode($nomiStatiPatologici);

?>

<script type="text/javascript">
    var obj = JSON.parse('<?$nomiStatiPatologiciJson; ?>');
    console.log(obj);
</script>



<!--js file that updates id after user selects name.-->
<script src="/fishesdiagnosis/js/commons/choosePatologicStateModal.js"></script>

<div id="choose-pat-st-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
              <input type="hidden" name="idStatoPat" id="idStatoPat"/>
              <label for="nomeStatoPat">Stato patologico:</label>
              <select class="form-control" name="nomeStatoPat" id="nomeStatoPat" style="display: inline-block" required>
                <?php
                  for ($i=0; $i<count($nomiStatiPatologici); $i++){
                      echo '<option>'.$nomiStatiPatologici[$i].'</option>';
                  }
                ?>
              </select>
            </fieldset>
          </form>
        </div><!--modal body--->
        <div class="modal-footer">
          <button type="button" id="confirm-choose-pat-st-button" class="btn btn-secondary">Conferma</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
        </div>
    </div><!--modal-content-->
</div><!--modal dialog-->
</div><!--modal-->
