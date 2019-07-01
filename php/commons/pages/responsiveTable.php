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



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.basictable/1.0.9/basictable.min.css" integrity="sha256-mbGb4F0wO234UQjFyqRSrFFMI8Nk2HgoIUv2Zly7z8I=" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.basictable/1.0.9/jquery.basictable.min.js" integrity="sha256-bRyGcU6tP9c78IZuj1jld29tzek4+eR+dBkdml3spKI=" crossorigin="anonymous"></script>


<!--<script src="http://localhost:8081/fishesdiagnosis/js/commons/editReportPage.js"></script>-->
<script src="http://localhost:8081/fishesdiagnosis/php/commons/pages/responsiveTable.js"></script>

  <style>
    html, body{
       height: 100%;
    }

    thead{
      position: -webkit-sticky !important;
      position: sticky !important;
       top:50px !important;
       z-index : 2000000!important;
    }
  </style>

</head>
<body>
  <?php include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/layout/headers.php"); ?><!-- shared navbar-->

  <main role="main" class="mt-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 col-md-offset-4 text-center mt-2 mb-4">
          <h1>Scheda n. 14</h1>
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

                <?php/* echo $presentSignsTableSchema*/?>


                  <div class="card d-md-block p-2">  <!--header for all forms-->
                    <table id="table" class="table table-sm table-striped header-fixed p-2">
                      <thead >
                        <tr >
                          <th class="p-3">Segno</th>
                          <th class="p-3">Presenza</th>
                          <th class="p-3">Frequenza</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>catarrosi ijefijefijiiiiiiiiiiiiiii  ijjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj</td>
                          <td>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                              <label class="form-check-label" for="inlineRadio1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                              <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                              <label class="form-check-label" for="inlineRadio3">Non so</label>
                            </div>
                          </td>
                          <td><input type="number" style="width:20%"></td>
                        </tr>

                        <tr>
                          <td>catarrosi jjjjjjjjjjjjjjj</td>
                          <td>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                              <label class="form-check-label" for="inlineRadio1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                              <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                              <label class="form-check-label" for="inlineRadio3">Non so</label>
                            </div>
                          </td>
                          <td><input type="number" style="width:20%"></td>
                        </tr>

                        <tr>
                          <td>uefuhefuh efuhefutest testtest testtesttesttesttest testtest test test</td>
                          <td>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                              <label class="form-check-label" for="inlineRadio1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                              <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                              <label class="form-check-label" for="inlineRadio3">Non so</label>
                            </div>
                          </td>
                          <td><input type="number" style="width:30%"></td>
                        </tr>

                        <tr>
                          <td>catarrosi jjjjjjjjjjjjjjj</td>
                          <td>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                              <label class="form-check-label" for="inlineRadio1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                              <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                              <label class="form-check-label" for="inlineRadio3">Non so</label>
                            </div>
                          </td>
                          <td><input type="number" style="width:20%"></td>
                        </tr>

                        <tr>
                          <td>catarrosi jjjjjjjjjjjjjjj</td>
                          <td>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                              <label class="form-check-label" for="inlineRadio1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                              <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                              <label class="form-check-label" for="inlineRadio3">Non so</label>
                            </div>
                          </td>
                          <td><input type="number" style="width:20%"></td>
                        </tr>

                        <tr>
                          <td>catarrosi jjjjjjjjjjjjjjj</td>
                          <td>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                              <label class="form-check-label" for="inlineRadio1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                              <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                              <label class="form-check-label" for="inlineRadio3">Non so</label>
                            </div>
                          </td>
                          <td><input type="number" style="width:20%"></td>
                        </tr>

                        <tr>
                          <td>catarrosi jjjjjjjjjjjjjjj</td>
                          <td>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                              <label class="form-check-label" for="inlineRadio1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                              <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                              <label class="form-check-label" for="inlineRadio3">Non so</label>
                            </div>
                          </td>
                          <td><input type="number" style="width:20%"></td>
                        </tr>

                        <tr>
                          <td>catarrosi jjjjjjjjjjjjjjj</td>
                          <td>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                              <label class="form-check-label" for="inlineRadio1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                              <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                              <label class="form-check-label" for="inlineRadio3">Non so</label>
                            </div>
                          </td>
                          <td><input type="number" style="width:20%"></td>
                        </tr>

                        <tr>
                          <td>catarrosi jjjjjjjjjjjjjjj</td>
                          <td>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                              <label class="form-check-label" for="inlineRadio1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                              <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                              <label class="form-check-label" for="inlineRadio3">Non so</label>
                            </div>
                          </td>
                          <td><input type="number" style="width:20%"></td>
                        </tr>

                        <tr>
                          <td>catarrosi jjjjjjjjjjjjjjj</td>
                          <td>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                              <label class="form-check-label" for="inlineRadio1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                              <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                              <label class="form-check-label" for="inlineRadio3">Non so</label>
                            </div>
                          </td>
                          <td><input type="number" style="width:20%"></td>
                        </tr>

                        <tr>
                          <td>catarrosi jjjjjjjjjjjjjjj</td>
                          <td>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                              <label class="form-check-label" for="inlineRadio1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                              <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                              <label class="form-check-label" for="inlineRadio3">Non so</label>
                            </div>
                          </td>
                          <td><input type="number" style="width:20%"></td>
                        </tr>

                        <tr>
                          <td>catarrosi jjjjjjjjjjjjjjj</td>
                          <td>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                              <label class="form-check-label" for="inlineRadio1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                              <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                              <label class="form-check-label" for="inlineRadio3">Non so</label>
                            </div>
                          </td>
                          <td><input type="number" style="width:20%"></td>
                        </tr>


                      </tbody>
                    </table>
                  </div><!--card (single line)-->

            </div><!--tab pane-->
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
        </div>
      </div> <!--1° row-->

    </div><!--container-fluid-->

  </main>
  <?php include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/layout/footer.php");?>
<body>
