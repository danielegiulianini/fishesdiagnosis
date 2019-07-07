<?php
/*in get oppure cookie c'è l'idScheda, lo memorizzo in una sessione? per ora il modal choose la specifica in get*/
//var_dump($_GET);
$idScheda = $_GET["idScheda"];

/*fetching species is needed for editReportModal (it's better to move this code to its file with include_once connect.php)*/
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


/*report general info (unlike the other info inside tabs) don't require datatable to be responsive
so their data are fetched already here with php. Datatble needs js to fetch them instead.*/
/*the query below doesn't ask for stato and siglaProvincia cause thery are not stored inside db.*/
$stmt=$conn->prepare("SELECT idScheda,
                              dataOraRegistrazione,
                              nomeRichiedente,
                              telefonoRichiedente,
                              emailRichiedente,
                              vasca,
                              nomeVeterinario,
                              specie,
                              sesso,
                              taglia,
                              eta,
                              origine,
                              percentualeAffetti,
                              numeroEsaminati,
                              sospetto,
                              note
                      FROM schedechiamate
                      where schedechiamate.idScheda = ?");
$stmt->bind_param("i", $idScheda);
$stmt->execute();
$result=$stmt->get_result();
$row=$result->fetch_assoc();

/*this process could be automatized too (even ids, names etc.)*/
$reportGeneralInfoTable='<table id="reports-info-1" class="table table-hover table-striped table-sm">
                            <tbody>
                              <tr>
                                <th scope="row">Scheda n.</th>
                                <td id="g-idScheda">'.$idScheda.'</td>
                              </tr>
                              <tr>
                                <th scope="row">Data</th>
                                <td id="g-data">'.$row["dataOraRegistrazione"].'</td>
                              </tr>
                              <tr>
                                <th scope="row">Nome richiedente</th>
                                <td id="g-nome-richiedente">'.$row["nomeRichiedente"].'</td>
                              </tr>
                              <tr>
                                <th scope="row">Telefono</th>
                                <td id="g-telefono">'.$row["telefonoRichiedente"].'</td>
                              </tr>
                              <tr>
                                <th scope="row">email</th>
                                <td id="g-email">'.$row["emailRichiedente"].'</td>
                              </tr>
                              <tr>
                                <th scope="row">nome vasca</th>
                                <td id="g-vasca">'.$row["vasca"].'</td>
                              </tr>
                              <tr>
                                <th scope="row">nome veterinario</th>
                                <td id="g-nome-veterinario">'.$row["nomeVeterinario"].'</td>
                              </tr>
                              <tr>
                                <th scope="row">Nome specie</th>
                                <td id="g-specie">'.$row["specie"].'</td>
                              </tr>
                              <tr>
                                <th scope="row">Sesso</th>
                                <td id="g-sesso">'.$row["sesso"].'</td>
                              </tr>
                              <tr>
                                <th scope="row">Taglia</th>
                                <td id="g-taglia">'.$row["taglia"].'</td>
                              </tr>
                              <tr>
                                <th scope="row">eta</th>
                                <td id="g-eta">'.$row["eta"].'</td>
                              </tr>
                              <tr>
                                <th scope="row">origine</th>
                                <td id="g-origine">'.$row["origine"].'</td>
                              </tr>
                              <tr>
                                <th scope="row">percentuale affetti</th>
                                <td id="g-percentuale-affetti">'.$row["percentualeAffetti"].'</td>
                              </tr>
                              <tr>
                                <th scope="row">numero esaminati</th>
                                <td id="g-numero-esaminati">'.$row["numeroEsaminati"].'</td>
                              </tr>
                              <tr>
                                <th scope="row">sospetto</th>
                                <td id="g-sospetto">'.$row["sospetto"].'</td>
                              </tr>
                              <tr>
                                <th scope="row">note</th>
                                <td id="g-note">'.$row["note"].'</td>
                              </tr>
                            </tbody>
                          </table>';


/*table schemas for datatable (datatables - jquery library - needs table schemas
already inside DOM before fetching data to it through js )*/
$presentSignsTableSchema =
'<table id="presents-signs-table" class="display" style="width:100%">
   <thead>
     <tr>
      <th>Segno presente</th>
      <th>Percentuale di presenza</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
       <th>Segno presente</th>
       <th>Percentuale di presenza</th>
    </tr>
  </tfoot>
</table>';

$absentSignsTableSchema =
'<table id="absents-signs-table" class="display" style="width:100%">
   <thead>
     <tr>
      <th>Segno presente</th>
      <th>Percentuale di presenza</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
       <th>Segno presente</th>
       <th>Percentuale di presenza</th>
    </tr>
  </tfoot>
</table>';

$measurementsTableSchema =
'<table id="measurements-table" class="display" style="width:100%">
   <thead>
     <tr>
      <th>Nome caratteristica</th>
      <th>Valore riscontrato</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
     <th>Nome caratteristica</th>
     <th>Valore riscontrato</th>
    </tr>
  </tfoot>
</table>';

$eventsTableSchema =
'<table id="events-table" class="display" style="width:100%">
   <thead>
     <tr>
      <th>Tipo evento</th>
      <th>Data evento</th>
      <th>Data comparsa segni</th>
      <th>Stato</th>
      <th>Sigla provincia</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
     <th>Tipo evento</th>
     <th>Data evento</th>
     <th>Data comparsa segni</th>
     <th>Stato</th>
     <th>Sigla provincia</th>
   </tr>
  </tfoot>
</table>';

?>


<!DOCTYPE html>
<html lang="it">
<head>
  <?php include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/commonHeadContent.php"); ?>


  <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/rowreorder/1.2.5/js/dataTables.rowReorder.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

  <script src="http://localhost:8081/fishesdiagnosis/js/commons/viewReportPage.js"></script>


  <!--for dataTables buttons-->
<!--  <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.bootstrap.min.css"></link>
  <link href="https://cdn.datatables.net/buttons/1.5.6/css/mixins.scss"></link>
  <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.css"></link>
  <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.jqueryui.css"></link>
  <link href="https://cdn.datatables.net/buttons/1.5.6/css/common.scss"></link>
  <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.bootstrap.css"></link>
  <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.bootstrap4.min.css"></link>
  <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.foundation.css"></link>
  <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.semanticui.css"></link>-->
  <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css"></link>
  <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.bootstrap4.css"></link>
<!--  <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.jqueryui.min.css"></link>
  <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.foundation.min.css"></link>
  <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.semanticui.min.css"></link>-->

  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.jqueryui.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.semanticui.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.jqueryui.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.foundation.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap4.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.foundation.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.semanticui.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.dataTables.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.js"></script>

  <!--<script src="https://cdn.datatables.net/buttons/1.5.6/swf/flashExport.swf"></script>-->


  <style>
    html, body{
       height: 100%;
    }
  </style>

</head>
<body>
<?php include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/layout/headers.php"); ?><!-- shared navbar-->

  <main role="main" class="mt-5">
  <div class="container-fluid">
    <div class="row mb-4 mb-md-0">
      <div class="col-md-4 mb-4 mb-md-0">
        <div class="card">
          <div class="card-body">
            <div class="card-title font-weight-bolder text-center lead">Informazioni generali scheda</div>

              <?php echo $reportGeneralInfoTable; ?>

              <button id="open-general-info-report-modal" class="btn btn-secondary ml-auto" data-toggle="modal" data-target="#edit-general-info-report-modal">Modifica</button>
          </div><!--end card-body-->
        </div><!--end card-->
      </div> <!--end 1° half of screen-->
      <!--un margine visibile solo per i mobile realizzato tramite mb-4 mb-md-0-->
      <div class="col-md-8">
        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active font-weight-bolder lead" id="present-signs-tab" data-toggle="tab" href="#present-signs" role="tab" aria-controls="present-signs-tab" aria-selected="true">Resoconto segni riscontrati</a>
          </li>
          <li class="nav-item">
            <a class="nav-link font-weight-bolder lead" id="absent-signs-tab" data-toggle="tab" href="#absent-signs" role="tab" aria-controls="absent-signs" aria-selected="true">Resoconto segni assenti</a>
          </li>
          <li class="nav-item">
            <a class="nav-link font-weight-bolder lead" id="measurements-tab" data-toggle="tab" href="#measurements" role="tab" aria-controls="measurements" aria-selected="false">Misurazioni effettuate</a>
          </li>
          <li class="nav-item">
            <a class="nav-link font-weight-bolder lead" id="events-tab" data-toggle="tab" href="#events" role="tab" aria-controls="events" aria-selected="false">Eventi considerati</a>
          </li>
          <li class="nav-item">
            <a class="nav-link font-weight-bolder lead" id="conclusion-tab" data-toggle="tab" href="#conclusion" role="tab" aria-controls="conclusion" aria-selected="false">Conclusione</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="present-signs" role="tabpanel" aria-labelledby="present-signs-tab">

            <?php echo $presentSignsTableSchema?>

          </div>
          <div class="tab-pane fade" id="absent-signs" role="tabpanel" aria-labelledby="absent-signs-tab">

            <?php echo $absentSignsTableSchema?>

          </div>
          <div class="tab-pane fade" id="measurements" role="tabpanel" aria-labelledby="measurements-tab">

            <?php echo $measurementsTableSchema?>

          </div>
          <div class="tab-pane fade" id="events" role="tabpanel" aria-labelledby="events-tab">

            <?php echo $eventsTableSchema?>

          </div>
          <div class="tab-pane fade" id="conclusion" role="tabpanel" aria-labelledby="conclusion-tab">

            ...

          </div>
        </div><!--tab content-->
      </div><!--2° half-->
    </div><!--row-->
    <!--un margine visibile solo per i mobile realizzato tramite mb-4 mb-md-0-->

    <div class="row">
      <div class="col-md-12 col-md-offset-4 text-center mt-2 mb-4">
        <button class="btn btn-secondary my-1 my-md-0">Visualizza probabilità</button>
        <a class="btn btn-secondary my-1 my-md-0" href="./editReportPage.php">Modifica informazioni</a>
      </div>
    </div> <!--2° row-->
  </div><!--container-fluid-->

  </main>

  <!--Modal for updating existing report general info-->
  <?php include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/layout/editReportGeneralInfoModal.php");?>

  <?php include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/layout/footer.php");?>
<body>
