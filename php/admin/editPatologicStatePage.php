<?php
include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/scripts/checkLoggedInAndRedirect.php");

$idStatoPat = $_GET["idStatoPat"];
$specie = $_GET["specie"];

/*
var_dump($idStatoPat);
var_dump($specie);*/

include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/connect.php");

/*basic table library, unlike datatable, needs that the data are already inside
the table tag, so I have to fetch them in php like here below. Datatables fetch
data by js instead. If i'll want to change technology, I 'll just replace this code.*/
$precompiledSignsListTable='<form id="signs-list-form">';
$precompiledSignsListTable.='<input type="hidden" name="request" value="edit"/>
                            <input type="hidden" name="subject" value="signs"/>
                            <input type="hidden" name="idStatoPat" value="'.$idStatoPat.'"/>
                            <input type="hidden" name="specie" value="'.$specie.'"/>';

$precompiledSignsListTable.='<div class="card d-md-block p-2">
                              <table id="table" class="table table-sm table-striped header-fixed p-2">
                                <thead>
                                  <tr>
                                    <th class="p-3" id="sign">Segno</th>
                                    <th class="p-3" id="yes-no-dontknow">Presenza</th>
                                    <th class="p-3" id="percentage">Percentuale</th>
                                  </tr>
                                </thead>
                                <tbody>';

//per marcare i radio giusti si poteva operare in maniera + procedurale:
//prima interrogare per i segni e, iterando su di loro, verificando con un ciclo innestato su presentazioni se il segno corrente era presente al suo interno.
//$stmt=$conn->prepare("SELECT segni.idSegno, segni.nome, presentazioni.gradoFrequenza FROM segni left outer join presentazioni on (segni.idSegno = presentazioni.idSegno) where (presentazioni.specie is null or presentazioni.specie = ?) and (presentazioni.idStatoPat is null or presentazioni.idStatoPat=?) order by segni.idSegno");

$stmt=$conn->prepare("SELECT segni.idSegno, segni.nome, temp.specie, temp.idStatoPat, temp.gradoFrequenza FROM segni left outer join (select presentazioni.idStatoPat, presentazioni.specie, presentazioni.idSegno, presentazioni.gradoFrequenza from presentazioni where idStatoPat = ? and specie =?)
as temp  on (segni.idSegno = temp.idSegno) order by segni.idSegno");
$stmt->bind_param("is", $idStatoPat, $specie);
$stmt->execute();
$result=$stmt->get_result();
for($i=0; $row=$result->fetch_assoc(); $i++){
  /*devo discriminare se si tratta di segno associato alla coppia stato-specie o no per disabilitare i radio giusti.
  anziché un for innestato, forse posso inferirlo valutando i null lasciati dagli outer join*/
  $yesRadio='';
  $noRadio='';
  $frequencyField='';

/*Since it is a particular form, that contains many items of the same type, I must use array notation in name
of input fields, so that the server can recognize every single item.*/
  if ($row["gradoFrequenza"]){  /*se gradoFrequenza è != null allora la tupla era in presentazioni */
    $yesRadio.='<input class="form-check-input" type="radio" name="presences['.$i.']" id="presences1['.$i.']" value="yes" checked>';
    $noRadio.='<input class="form-check-input" type="radio" name="presences['.$i.']" id="presences2['.$i.']" value="no">';
    $frequencyField.='<td headers="percentage"><input class="percentage" type="number" min="0" max="1" step=".1" name="percentages['.$i.']" value="'.$row["gradoFrequenza"].'"></td>';
  } else {
    $yesRadio.='<input class="form-check-input" type="radio" name="presences['.$i.']" id="presences1['.$i.']" value="yes">';
    $noRadio.='<input class="form-check-input" type="radio" name="presences['.$i.']" id="presences2['.$i.']" value="no" checked>';
    $frequencyField.='<td  headers="percentage"><input class="percentage" type="number" min="0" max="1" step=".1" name="percentages['.$i.']" disabled></td>';
  }

/*I must include a input type hidden field(segno) for the server to know which record to update in the db*/
  $precompiledSignsListTable.='<tr>
                                <td headers="sign"><input type="hidden" name="idSegno['.$i.']" value="'.$row["idSegno"].'"\>'.$row["nome"].'</td>
                                <td headers="yes-no-dontknow">
                                  <div class="form-check form-check-inline">
                                    '.$yesRadio.'
                                    <label class="form-check-label" for="presences1['.$i.']">Si</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    '.$noRadio.'
                                    <label class="form-check-label" for="presences2['.$i.']">No</label>
                                  </div>
                                </td>
                                '.$frequencyField.'
                              </tr>';
}

$precompiledSignsListTable.='</tbody>
                             </table>
                             </div><!--card (single line)-->';
$precompiledSignsListTable.='</form>';

/*table schemas needed by datatables. This table will be fetched by js.*/
/*
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

$conclusionsTableSchema =
'<table id="conclusions-table" class="display" style="width:100%">
   <thead>
     <tr>
      <th>id conclusione</th>
      <th>Risposta</th>
      <th>Evoluzione</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
     <th>id conclusione</th>
     <th>Risposta</th>
     <th>Evoluzione</th>
   </tr>
  </tfoot>
</table>';
*/

?>

<!DOCTYPE html>
<html lang="it">
<head>
  <?php include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/commonHeadContent.php"); ?>

<!--aa the end to add in commonHeadContent-->
<!--for responsive datatable -->
  <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/rowreorder/1.2.5/js/dataTables.rowReorder.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

  <!--for dataTables buttons-->
<!--  <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/buttons/1.5.6/css/mixins.scss"  rel="stylesheet">
  <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.css"  rel="stylesheet">
  <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.jqueryui.css"  rel="stylesheet">
  <link href="https://cdn.datatables.net/buttons/1.5.6/css/common.scss"  rel="stylesheet">
  <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.bootstrap.css"  rel="stylesheet">
  <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.bootstrap4.min.css"  rel="stylesheet">
  <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.foundation.css"  rel="stylesheet">
  <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.semanticui.css"  rel="stylesheet">-->
  <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css"  rel="stylesheet">
  <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.bootstrap4.css" rel="stylesheet">
<!--  <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.jqueryui.min.css"  rel="stylesheet">
  <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.foundation.min.css"  rel="stylesheet">
  <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.semanticui.min.css"  rel="stylesheet">-->

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

<!--for responsive basic tables-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.basictable/1.0.9/basictable.min.css" integrity="sha256-mbGb4F0wO234UQjFyqRSrFFMI8Nk2HgoIUv2Zly7z8I=" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.basictable/1.0.9/jquery.basictable.min.js" integrity="sha256-bRyGcU6tP9c78IZuj1jld29tzek4+eR+dBkdml3spKI=" crossorigin="anonymous"></script>







<script src="http://localhost:8081/fishesdiagnosis/js/admin/editPatologicStatePage.js"></script>

  <style>
    html, body{
       height: 100%;
    }
  </style>

</head>
<body>
  <?php include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/layout/headers.php"); ?><!-- shared navbar-->

  <main class="mt-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 col-md-offset-4 text-center mt-2 mb-4">
          <h1>Stato patologico n. <?php echo $idStatoPat;?></h1> <!--questa sarà settata dalla sessione-->
        </div>
      </div> <!--1° row-->

      <div class="row">
        <div class="col-md-12 col-md-offset-4 text-center mb-4">
            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active font-weight-bolder lead" id="present-signs-tab" data-toggle="tab" href="#present-signs" role="tab" aria-controls="present-signs-tab" aria-selected="true">Resoconto segni riscontrati</a>
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

                <?php echo $precompiledSignsListTable;?>

              </div><!--tab pane-->
              <div class="tab-pane fade" id="measurements" role="tabpanel" aria-labelledby="measurements-tab">

                <?php /*echo $measurementsTableSchema;*/?>

              </div>
              <div class="tab-pane fade" id="events" role="tabpanel" aria-labelledby="events-tab">

                <?php /*echo $eventsTableSchema;*/?>

              </div>
              <div class="tab-pane fade" id="conclusion" role="tabpanel" aria-labelledby="conclusion-tab">

                <?php/* echo $conclusionsTableSchema;*/?>

              </div>
            </div><!--tab content-->
          </div><!--2° half-->
      </div> <!--1° row-->
      <div class="row">
        <div class="col-md-12 col-md-offset-4 text-center mt-2 mb-4">
          <button id="confirm-editing-list" class="btn btn-secondary my-1 my-md-0">Conferma inserimento</button>
          <!--<button class="btn btn-secondary my-1 my-md-0">Modifica informazioni</button>-->
        </div>
      </div> <!--2° row-->
    </div><!--container-fluid-->

  </main>

  <!--Modal for adding measurement-->
  <?php include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/layout/addMeasurementModal.php");?>

  <!--Modal for adding event-->
  <?php include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/layout/addEventModal.php");?>

  <!--Modal for adding conclusion-->
  <?php include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/layout/addConclusionModal.php");?>



  <?php include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/layout/footer.php");?>
</body>
