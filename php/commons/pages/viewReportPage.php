<?php
/*fetching species is needed for editReportModal*/
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
'<table id="absents-signs-table" class="display" style="width:100%">
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
              <table id="reports-info-1" class="table table-hover table-striped table-sm">
                <tbody>
                  <tr>
                    <th scope="row">Scheda n.</th>
                    <td id="g-idScheda">test</td>
                  </tr>
                  <tr>
                    <th scope="row">Data</th>
                    <td id="g-data">test</td>
                  </tr>
                  <tr>
                    <th scope="row">Nome richiedente</th>
                    <td id="g-nome-richiedente">test</td>
                  </tr>
                  <tr>
                    <th scope="row">Telefono</th>
                    <td id="g-telefono">test</td>
                  </tr>
                  <tr>
                    <th scope="row">email</th>
                    <td id="g-email">test</td>
                  </tr>
                  <tr>
                    <th scope="row">stato</th>
                    <td id="g-stato">test</td>
                  </tr>
                  <tr>
                    <th scope="row">sigla provincia</th>
                    <td id="g-sigla-provincia">test</td>
                  </tr>
                  <tr>
                    <th scope="row">nome vasca</th>
                    <td id="g-vasca">test</td>
                  </tr>
                  <tr>
                    <th scope="row">nome veterinario</th>
                    <td id="g-nome-veterinario">test</td>
                  </tr>
                  <tr>
                    <th scope="row">Nome specie</th>
                    <td id="g-specie">test</td>
                  </tr>
                  <tr>
                    <th scope="row">Sesso</th>
                    <td id="g-sesso">test</td>
                  </tr>
                  <tr>
                    <th scope="row">Taglia</th>
                    <td id="g-taglia">test</td>
                  </tr>
                  <tr>
                    <th scope="row">eta</th>
                    <td id="g-eta">test</td>
                  </tr>
                  <tr>
                    <th scope="row">percentuale affetti</th>
                    <td id="g-percentuale-affetti">test</td>
                  </tr>
                  <tr>
                    <th scope="row">numero esaminati</th>
                    <td id="g-numero-esaminati">test</td>
                  </tr>
                  <tr>
                    <th scope="row">sospetto</th>
                    <td id="g-sospetto">test</td>
                  </tr>
                  <tr>
                    <th scope="row">note</th>
                    <td id="g-note">test</td>
                  </tr>
                </tbody>
              </table>

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
