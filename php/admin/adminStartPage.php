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
              <a class="btn btn-secondary ml-2 mr-2 mb-2" data-toggle="modal" data-target="#addModal">Inserisci scheda chiamata</a>
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
  <!-- Large modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>


  </main>




  nomeVeterinario,nomeRichiedente,telefonoRichiedente,
  emailRichiedente,sospetto,percentualeAffetti,numeroEsaminati,taglia,eta,sesso,specie,vasca,origine,note


  <!-- must divide modal in 2 columns (too many info)-->
    <!--Modal for inserting new data-->
  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
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
                <label for="i-nome">nome richiedente</label>
                <input type="text" class="form-control nome" name="nome" id="i-nome" required>
                <label for="i-nome">telefono richiedente</label>
                <input type="text" class="form-control nome" name="nome" id="i-nome" required>
                <label for="i-nome">email richiedente</label>
                <input type="text" class="form-control nome" name="nome" id="i-nome" required>
                <label for="i-nome">nome veterinario</label>
                <input type="text" class="form-control nome" name="nome" id="i-nome" required>
              </fieldset>

                </div><!--1° col-md-6-->
                <div class="col-md-6">
                  <fieldset class="form-group">
                    <div class="form-row">
                      <div class="col-6 col-md-6">
                        <label for="validationDefault03">numero affetti</label>
                        <input type="number" class="form-control" id="validationDefault03" placeholder="City" required>
                      </div>
                      <div class="col-6 col-md-6">
                        <label for="validationDefault03">numero affetti</label>
                        <input type="number" class="form-control" id="validationDefault03" placeholder="City" required>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="col-4 col-md-4">
                        <label for="validationDefault03">taglia</label>
                        <input type="number" class="form-control" id="validationDefault03" placeholder="City" required>
                      </div>
                      <div class="col-4 col-md-4">
                        <label for="i-categoria">Specie</label>
                        <select class="form-control categoria" name="i-categoria" id="i-categoria" style="display: inline-block" required>
                          <?php
                            for ($i=0; $i<count($specie); $i++){
                                echo '<option>'.$specie[$i].'</option>';
                            }
                          ?>
                        </select>
                        </div>
                        <div class="col-md-4">
                          <label for="validationDefault03">sesso</label>
                          <input type="number" class="form-control" id="validationDefault03" placeholder="City" required>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="col-4 col-md-4">
                          <label for="validationDefault03">taglia</label>
                          <input type="number" class="form-control" id="validationDefault03" placeholder="City" required>
                        </div>
                        <div class="col-4 col-md-4">
                          <label for="i-categoria">Specie</label>
                          <select class="form-control categoria" name="i-categoria" id="i-categoria" style="display: inline-block" required>
                            <?php
                              for ($i=0; $i<count($specie); $i++){
                                  echo '<option>'.$specie[$i].'</option>';
                              }
                            ?>
                          </select>
                          </div>
                          <div class="col-4 col-md-4">
                            <label for="validationDefault03">sesso</label>
                            <input type="number" class="form-control" id="validationDefault03" placeholder="City" required>
                          </div>
                        </div>

                        <div class="form-row">
                          <label for="i-ingredienti">note</label>
                          <textarea class="form-control ingredienti" rows="3" required  name="ingredienti" id="i-ingredienti"></textarea>
                        </div>

    </fieldset>
                </div>
            </div><!--row-->
            <div class="row">
            </div>
          </div>
        </form>

          <!--<form id="addForm" method="post" action="/progettoweb/php/supplier/menuItemsManager.php" novalidate>
            <input type="hidden" name="request" value="add">
            <div class="form-group">
              <label for="i-nome">nome Veterinario</label>
              <input type="text" class="form-control nome" name="nome" id="i-nome" required>
            </div>
            <div class="form-group">
              <label for="i-ingredienti">nome Richiedente</label>
              <textarea class="form-control ingredienti" rows="3" required  name="ingredienti" id="i-ingredienti"></textarea>
            </div>
            <div class="form-group">
              <label for="i-prezzoVendita">telefonoRichiedente</label>
              <input type="text" class="form-control prezzoVendita" name="prezzoVendita" id="i-prezzoVendita" required>
            </div>
            <div class="form-group">
              <label for="i-prezzoListino">Prezzo listino</label>
              <input type="text" class="form-control prezzoListino" name="prezzoListino" id="i-prezzoListino" required>
            </div>
            <div class="form-group">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input disponibile" name="disponibile" id="disponibile" value="1">
                <label class="custom-control-label" for="disponibile">Disponibile</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input celiaco" name="celiaco" id="celiaco" value="1">
                <label class="custom-control-label" for="celiaco">Per celiaci</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input vegano" name="vegano" id="vegano" value="1">
                <label class="custom-control-label" for="vegano" >Per vegani</label>
              </div>
            </div>
          </form>-->
      </div>
    </div>
    </div>
  </div>







  <?php include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/layout/footer.php");?>
<body>
