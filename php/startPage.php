<!DOCTYPE html>
<html lang="it">
<head>
    <?php include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/commonHeadContent.php"); ?>
    <!--<link href="/progettoweb/css/administrator/common.css" rel="stylesheet">
    <script src="/progettoweb/js/administrator/clients.js"></script>-->
<style>
.album a {
  color:white !important;
}
</style>


</head>
<body>
<?php include("./commons/layout/headers.php"); ?><!-- shared navbar-->

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
              <p class="card-title my-2">Inserisci</p>
              <a class="btn btn-secondary ml-2 mr-2 mb-2">Inserisci scheda chiamata</a>
              <a class="btn btn-secondary m-2">Inserisci stato patologico</a>
              <a class="btn btn-secondary m-2">test</a>
            </div>
          </div>

            <div class="col-md-3 mx-auto">
              <div class="card box-shadow text-center">
                <p class="card-title my-2">Visualizza - modifica</p>
                <a class="btn btn-secondary m-2">Visualiza scheda chiamata</a>
                <a class="btn btn-secondary m-2">Visualizza stato patologico</a>
                <a class="btn btn-secondary m-2">test</a>
              </div>
          </div>
          <div class="col-md-3 mx-auto">
            <div class="card box-shadow text-center">
              <p class="card-title my-2">Modifica</p>
              <a class="btn btn-secondary m-2">Modifica pesi</a>
              <a class="btn btn-secondary m-2">test</a>
              <a class="btn btn-secondary m-2">test</a>
            </div>
          </div>
        </div>
      </div>
  </div>
  </main>

  <footer class="text-muted">
    <div class="container">
      <p class="text-center">footer</p>
    </div>
  </footer>
<body>
