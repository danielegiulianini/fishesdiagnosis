<?php
include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/connect.php");

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

<!DOCTYPE html>
<html lang="it">
<head>
    <?php include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/commonHeadContent.php"); ?>
    <!--<script src="/progettoweb/js/administrator/clients.js"></script>-->


    <!--<link href="../../dist/css/bootstrap-fs-modal.min.css" rel="stylesheet">-->


<style>
html, body {
   height: 100% !important;
}

.album a {
  color:white !important;
}

.hint{
  font-size:120%;
}


/*@media (max-width: 768px) {
  #add-report-modal{
    width:50%;
  }
}*/
</style>
</head>
<body>
<?php include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/layout/headers.php"); ?><!-- shared navbar-->

  <main role="main" class="mt-3">
    <section class="jumbotron text-center">
      <div class="container">
        <h1 class="jumbotron-heading mt-3">Fishes Diagnosis</h1>
        <p class="lead text-muted">Admin account</p>
      </div>

    <div class="album py-5 bg-light">
      <div class="container ">
        <div class="row d-flex align-items-center">
          <div class="col-md-3 mx-auto">
            <div class="card box-shadow text-center pb-0">
              <p class="card-title my-2 hint">Inserisci</p>
              <a class="btn btn-secondary ml-2 mr-2 mb-2" data-toggle="modal" data-target="#add-report-modal">Inserisci scheda chiamata</a>
              <a class="btn btn-secondary m-2">Inserisci stato patologico</a>
              <a class="btn btn-secondary m-2">test</a>
            </div>
          </div>

            <div class="col-md-3 mx-auto">
              <div class="card box-shadow text-center">
                <p class="card-title my-2 hint">Visualizza - modifica</p>
                <a href="../commons/pages/viewReportPage.php" class="btn btn-secondary m-2">Visualizza scheda chiamata</a>
                <a class="btn btn-secondary m-2">Visualizza stato patologico</a>
                <a class="btn btn-secondary m-2">test</a>
              </div>
          </div>
          <div class="col-md-3 mx-auto">
            <div class="card box-shadow text-center">
              <p class="card-title my-2 hint">Modifica</p>
              <a class="btn btn-secondary m-2">Modifica pesi</a>
              <a class="btn btn-secondary m-2">test</a>
              <a class="btn btn-secondary m-2">test</a>
            </div>
          </div>
        </div>
      </div>
  </div>
  </section>
</main>




  nomeVeterinario,nomeRichiedente,telefonoRichiedente,
  emailRichiedente,sospetto,percentualeAffetti,numeroEsaminati,taglia,eta,sesso,specie,vasca,origine,note


  <!--Modal for inserting new data-->
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
          <form>
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
                  <input type="number" min="0" max=100 class="form-control" id="numeroAffetti" placeholder="25" name="numeroAffetti">
                </div>
              </div>

              <div class="form-row">
                <div class="col-3 col-md-3">
                  <label for="taglia">taglia(cm)</label>
                  <input type="number" class="form-control" id="taglia" placeholder="15">
                </div>
                <div class="col-3 col-md-3">
                  <label for="specie">specie</label>
                  <select class="form-control categoria" name="specie" id="specie" style="display: inline-block" required>
                    <?php
                      for ($i=0; $i<count($specie); $i++){
                          echo '<option>'.$specie[$i].'</option>';
                      }
                    ?>
                  </select>
                  </div>
                  <div class="col-3 col-md-3">
                    <label for="sesso">sesso</label>
                    <input type="number" class="form-control" name="sesso" id="sesso" placeholder="maschio" required>
                  </div>
                  <div class="col-3 col-md-3">
                    <label for="eta">eta(mesi)</label>
                    <input type="number" class="form-control" name="eta" id="eta" placeholder="11" required>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-12 col-md-4">
                    <label for="vasca">vasca</label>
                    <input type="number" class="form-control" id="vasca" name="vasca" placeholder="vasca1" required>
                  </div>
                  <div class="col-6 col-md-4">
                    <label for="origine">origine</label>
                    <select class="form-control categoria" name="origine" id="origine" style="display: inline-block" required>
                      <?php
                        for ($i=0; $i<count($specie); $i++){
                            echo '<option>'.$specie[$i].'</option>';
                        }
                      ?>
                    </select>
                    </div>
                    <div class="col-6 col-md-4">
                      <label for="sospetto">sospetto</label>
                      <input type="text" class="form-control" id="sospetto" name="sospetto" placeholder="KVD" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <label for="i-ingredienti">note</label>
                    <textarea class="form-control ingredienti" rows="3" required  name="ingredienti" id="i-ingredienti"></textarea>
                  </div>
            </fieldset>
          </div>
            </div><!--row-->
          </div>
        </form>
        <div class="modal-footer">
          <button type="button" id="confirm-add-Button" class="btn btn-secondary">Conferma inserimento nuova scheda</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
        </div>
      </div><!--modal-content-->
  </div>
</div>
    </div><!--modal dialog-->
  </div><!--modal-->

  <?php include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/layout/footer.php");?>
<body>
