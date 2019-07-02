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
              <a class="btn btn-secondary m-2" data-toggle="modal" data-target="#add-pat-st-modal">Inserisci stato patologico</a>
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

    <!--Modal for inserting new report-->
    <?php include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/layout/addReportModal.php");?>

    <!--Modal for inserting new patologic state-->
    <?php include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/admin/addPatologicStateModal.php");?>


  <?php include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/layout/footer.php");?>
<body>
