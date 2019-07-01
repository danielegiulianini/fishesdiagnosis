<?php
include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/connect.php");

/*basic table library, unlike datatable, needs that the data are already inside
the table tag, so I have to fetch them in php like here below. Datatables fetch
data by js instead. If i'll want to change technology, I 'll just replace this code.*/
$precompiledSignsListTable ='<div class="card d-md-block p-2">
                              <table id="table" class="table table-sm table-striped header-fixed p-2">
                                <thead>
                                  <tr>
                                    <th class="p-3" id="sign">Segno</th>
                                    <th class="p-3" id="yes-no-dontknow">Presenza</th>
                                    <th class="p-3" id="percentage">Percentuale</th>
                                  </tr>
                                </thead>
                                <tbody>';
$precompiledSignsListTable.='</form>';

$stmt=$conn->prepare("SELECT segni.idSegno as segno_idSegno, segni.nome, segnipresenti.idSegno as segnipresenti_idSegno, segnipresenti.percentuale, segniassenti.idSegno as segniassenti_idSegno FROM segni left outer join segniassenti on (segni.idSegno = segniassenti.idSegno) left outer join segnipresenti on (segni.idSegno = segnipresenti.idSegno)");
$stmt->execute();
$result=$stmt->get_result();
for($i=0; $row=$result->fetch_assoc(); $i++){
  /*devo discriminare se si tratta di segno assente / presente o nessuno dei 2 per disabilitare i radio giusti.
  anziché un for innestato, forse posso inferirlo giostrando con i null lasciati dagli outer join*/
  $yesRadio='';
  $noRadio='';
  $dontKnowRadio='';
  $percentageField='';

/*Since it is a particular form, that contains many items of the same type, I must use array notation in name
of input fields, so that the server can recognize every single item.*/
  if ($row["segnipresenti_idSegno"]){  /*se segnipresenti_idSegno è != null allora la tupla era in segnipresenti */
    $yesRadio.='<input class="form-check-input" type="radio" name="presences['.$i.']" id="presences1['.$i.']" value="yes" checked>';
    $noRadio.='<input class="form-check-input" type="radio" name="presences['.$i.']" id="presences2['.$i.']" value="no">';
    $dontKnowRadio.='<input class="form-check-input" type="radio" name="presences['.$i.']" id="presences3['.$i.']" value="dontKnow">';
    $percentageField.='<td headers="percentage"><input class="percentage" type="number" min="1" max="100" name="percentages['.$i.']"></td>';
  } else {
    if ($row["segniassenti_idSegno"]){  /*se segniassenti_idSegno è != null allora la tupla era in segniassenti */
      $yesRadio.='<input class="form-check-input" type="radio" name="presences['.$i.']" id="presences1['.$i.']" value="yes">';
      $noRadio.='<input class="form-check-input" type="radio" name="presences['.$i.']" id="presences2['.$i.']" value="no" checked>';
      $dontKnowRadio.='<input class="form-check-input" type="radio" name="presences['.$i.']" id="presences3['.$i.']" value="dontKnow">';
      $percentageField.='<td  headers="percentage"><input class="percentage" type="number" min="1" max="100" name="percentages['.$i.']" disabled></td>';
    } else {                             /*se entrambi sono null allora la tupla non era in nessuno dei 2 */
      $yesRadio.='<input class="form-check-input" type="radio" name="presences['.$i.']" id="presences1['.$i.']" value="yes">';
      $noRadio.='<input class="form-check-input" type="radio" name="presences['.$i.']" id="presences2['.$i.']" value="no">';
      $dontKnowRadio.='<input class="form-check-input" type="radio" name="presences['.$i.']" id="presences3['.$i.']" value="dontKnow" checked>';
      $percentageField.='<td headers="percentage"><input class="percentage" type="number" min="1" max="100" name="percentages['.$i.']" disabled></td>';
    }
  }

/*I must include a input type hiden field for the server to know which record to ipdate in the db*/
  $precompiledSignsListTable.='<tr>
                                <td headers="sign"><input type="hidden" value='.$row["segno_idSegno"].'\>'.$row["nome"].'</td>
                                <td headers="yes-no-dontknow">
                                  <div class="form-check form-check-inline">
                                    '.$yesRadio.'
                                    <label class="form-check-label" for="presences1['.$i.']">Si</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    '.$noRadio.'
                                    <label class="form-check-label" for="presences2['.$i.']">No</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    '.$dontKnowRadio.
                                    '<label class="form-check-label" for="presences3['.$i.']">Non so</label>
                                  </div>
                                </td>
                                '.$percentageField.'
                              </tr>';
}
$precompiledSignsListTable.='</form>';
$precompiledSignsListTable.='</tbody>
                             </table>
                             </div><!--card (single line)-->';
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


<!--for responsive basic tables-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.basictable/1.0.9/basictable.min.css" integrity="sha256-mbGb4F0wO234UQjFyqRSrFFMI8Nk2HgoIUv2Zly7z8I=" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.basictable/1.0.9/jquery.basictable.min.js" integrity="sha256-bRyGcU6tP9c78IZuj1jld29tzek4+eR+dBkdml3spKI=" crossorigin="anonymous"></script>

<script src="http://localhost:8081/fishesdiagnosis/js/commons/editReportPage.js"></script>

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
      <div class="row">
        <div class="col-md-12 col-md-offset-4 text-center mt-2 mb-4">
          <h1>Scheda n. 14</h1> <!--questa sarà settata dalla sessione-->
        </div>
      </div> <!--1° row-->

      <div class="row">
        <div class="col-md-12 col-md-offset-4 text-center mb-4">
          <!--<div class="col-md-8">-->
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

                <?php echo $precompiledSignsListTable;?>

              </div><!--tab pane-->
              <div class="tab-pane fade" id="absent-signs" role="tabpanel" aria-labelledby="absent-signs-tab">

                <?php echo $absentSignsTableSchema;?>

              </div>
              <div class="tab-pane fade" id="measurements" role="tabpanel" aria-labelledby="measurements-tab">

                <?php echo $measurementsTableSchema;?>

              </div>
              <div class="tab-pane fade" id="events" role="tabpanel" aria-labelledby="events-tab">

                <?php echo $eventsTableSchema;?>

              </div>
              <div class="tab-pane fade" id="conclusion" role="tabpanel" aria-labelledby="conclusion-tab">

                ...

              </div>
            </div><!--tab content-->
          </div><!--2° half-->
        </div>
      </div> <!--1° row-->
      <div class="row">
        <div class="col-md-12 col-md-offset-4 text-center mt-2 mb-4">
          <button class="btn btn-secondary my-1 my-md-0">Conferma inserimento</button>
          <button class="btn btn-secondary my-1 my-md-0">Modifica informazioni</button>
        </div>
      </div> <!--2° row-->
    </div><!--container-fluid-->

  </main>
  <?php include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/layout/footer.php");?>
<body>
