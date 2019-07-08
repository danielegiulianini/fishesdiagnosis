<?php

include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/scripts/checkLoggedInAndRedirect.php");

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
        <p class="lead text-muted">user account</p>
      </div>

    <div class="album py-5 bg-light">
      <div class="container ">
        <div class="row d-flex align-items-center">
            <div class="col-md-3 mx-auto">
              <div class="card box-shadow text-center">
                <p class="card-title my-2 hint">Visualizza - modifica - inserisci</p>
                <a class="btn btn-secondary m-2" data-toggle="modal" data-target="#add-general-info-report-modal">Inserisci scheda chiamata</a>
                <a class="btn btn-secondary m-2" data-toggle="modal" data-target="#choose-report-modal">Visualizza scheda chiamata</a>
                <a class="btn btn-secondary m-2">test</a>
              </div>
          </div>

        </div>
      </div>
    </div>
    </section>
  </main>

  <!--Modal for inserting new report-->
  <?php include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/layout/insertReportGeneralInfoModal.php");?>

  <!--Modal for choosing report-->
  <?php include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/layout/chooseReportModal.php");?>




  <?php include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/layout/footer.php");?>
<body>
