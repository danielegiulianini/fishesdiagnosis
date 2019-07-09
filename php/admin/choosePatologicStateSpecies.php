<!--
dependencies of this file:
1. a variable $conn in the importing file, containing a mysqli connection object (superable by using include_once("....connect.php"))
2. a variable $idStatoPat containing the patologic state id
-->

<?php
/*user is more familiar with statoPatologico nome but php file needs its id.
I need js file to update id after user selects name.*/

$stmt=$conn->prepare("SELECT specie FROM specie");
$stmt->execute();
$result=$stmt->get_result();
while($row=$result->fetch_assoc()){
  $specie_assoc[]=$row;
}
$specie=array(); //devo trasformare l'array associativo in array di valori
foreach($specie_assoc as $item){
  $specie[]=$item["specie"];
}

?>


<div id="choose-species-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Scegli scheda chiamata</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <div class="modal-body">
        <form id="choose-species-form" method="get" action="/fishesdiagnosis/php/admin/editPatologicStatePage.php">
            <fieldset class="form-group">
              <input type="hidden" name="idStatoPat" id="idStatoPat" value="<?php echo $idStatoPat;?>"/>


              <label for="e-specie">specie</label>
              <select class="form-control specie" name="specie" id="e-specie" style="display: inline-block" required>
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
          <button type="submit" form="choose-species-form" id="confirm-choose-pat-st-button" class="btn btn-secondary">Conferma</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
        </div>
    </div><!--modal-content-->
</div><!--modal dialog-->
</div><!--modal-->
