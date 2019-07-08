<?php
include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/scripts/checkLoggedInAndRedirect.php");

$idScheda = $_GET["idScheda"];

include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/connect.php");
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

<!--chartjs for display graphs-->
<!--<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
-->

<script src="http://localhost:8081/fishesdiagnosis/js/commons/displayProbabilitiesPage.js"></script>

  <style>
    html, body{
       height: 100%;
    }


.block-header { /*not used*/
  margin-bottom: 15px; }
  .block-header h2 {
    margin: 0 !important;
    color: #666 !important;
    font-weight: normal;
    font-size: 16px; }
    .block-header h2 small {
      display: block;
      font-size: 12px;
      margin-top: 8px;
      color: #888; }
      .block-header h2 small a {
        font-weight: bold;
        color: #777; }

  .header { /*anche questo va bene ->> posso sosituirla lla classe card-header*/
    color: #555;
    padding: 20px;
    position: relative;
    border-bottom: 1px solid rgba(204, 204, 204, 0.35);
  }


  .card-shadow {  /*non molto coerente con la ux attuale*/
    box-shadow: 0px 2px 4px -1px rgba(0, 0, 0, 0.2), 0px 4px 5px 0px rgba(0, 0, 0, 0.14), 0px 1px 10px 0px rgba(0, 0, 0, 0.12);
    transition: box-shadow 0.28s cubic-bezier(0.4, 0, 0.2, 1);
  }
  </style>

</head>
<body>
  <?php include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/layout/headers.php"); ?><!-- shared navbar-->

  <main class="mt-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 col-md-offset-4 text-center mt-2 mb-4">
          <h1>Scheda n. <span id="p-idScheda"> <?php echo $idScheda;?></span></h1> <!--questa sarà settata dalla sessione-->
        </div>
      </div> <!--1° row-->

      <div class="row">
        <div class="col-md-12 col-md-offset-4 text-center mb-4">
            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active font-weight-bolder lead" id="signs_prob-tab" data-toggle="tab" href="#signs_prob-tab-pane" role="tab" aria-controls="presigns_prob" aria-selected="true">Resoconto segni riscontrati</a>
              </li>
              <li class="nav-item">
                <a class="nav-link font-weight-bolder lead" id="water_prob-tab" data-toggle="tab" href="#water_prob-tab-pane" role="tab" aria-controls="water_prob" aria-selected="false">Misurazioni effettuate</a>
              </li>
              <li class="nav-item">
                <a class="nav-link font-weight-bolder lead" id="location_prob-tab" data-toggle="tab" href="#location_prob-tab-pane" role="tab" aria-controls="location_prob" aria-selected="false">Eventi considerati</a>
              </li>
              <li class="nav-item">
                <a class="nav-link font-weight-bolder lead" id="overall_prob-tab" data-toggle="tab" href="#overall_prob-tab-pane" role="tab" aria-controls="overall_prob" aria-selected="false">Conclusione</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="signs_prob-tab-pane" role="tabpanel" aria-labelledby="signs_prob-tab">


<section id="signs_prob" class="content mt-2">
        <div class="container-fluid">
            <!--<div class="block-header">
                <h1>Probabilità segni</h1>
            </div>-->
            <div class="row">
                <!-- Line Chart -->
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="card m-1 card-shadow">
                        <div class="card-header"><!--or card-title-->
                            <h2>Line chart</h2>
                        </div>
                        <div class="card-body">
                            <canvas id="signs_prob-line_chart" height="150"></canvas>
                        </div>
                    </div>
                </div><!-- Line Chart -->
                <!-- Bar Chart -->
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="card m-1">
                        <div class="card-header">
                            <h2>Bar chart</h2>
                        </div>
                        <div class="card-body">
                            <canvas id="signs_prob-bar_chart" height="150"></canvas>
                        </div>
                    </div>
                </div><!--bar Chart-->
            </div>

            <div class="row">
                <!-- Radar Chart -->
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="card m-1">
                        <div class="card-header">
                            <h2>Radar chart</h2>
                        </div>
                        <div class="card-body">
                            <canvas id="signs_prob-radar_chart" height="150"></canvas>
                        </div>
                    </div>
                </div><!--radar Chart -->
                <!-- Pie Chart -->
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="card m-1">
                        <div class="card-header">
                            <h2>Pie chart</h2>
                        </div>
                        <div class="card-body">
                            <canvas id="signs_prob-pie_chart" height="150"></canvas>
                        </div>
                    </div>
                </div><!--Pie Chart -->
            </div>
        </div>
    </section>




              </div><!--tab pane-->
              <div class="tab-pane fade" id="location_prob-tab-pane" role="tabpanel" aria-labelledby="location_prob-tab">

<section id="location_prob" class="content mt-2">
    <div class="container-fluid">
        <!--<div class="block-header">
            <h1>Probabilità segni</h1>
        </div>-->
        <div class="row">
            <!-- Line Chart -->
            <div class="col-lg-6 col-md-6 col-12">
                <div class="card m-1 card-shadow">
                    <div class="card-header"><!--or card-title-->
                        <h2>Line chart</h2>
                    </div>
                    <div class="card-body">
                        <canvas id="location_prob-line_chart" height="150"></canvas>
                    </div>
                </div>
            </div><!-- Line Chart -->
            <!-- Bar Chart -->
            <div class="col-lg-6 col-md-6 col-12">
                <div class="card m-1">
                    <div class="card-header">
                        <h2>Bar chart</h2>
                    </div>
                    <div class="card-body">
                        <canvas id="location_prob-bar_chart" height="150"></canvas>
                    </div>
                </div>
            </div><!--bar Chart-->
        </div>

        <div class="row">
            <!-- Radar Chart -->
            <div class="col-lg-6 col-md-6 col-12">
                <div class="card m-1">
                    <div class="card-header">
                        <h2>Radar chart</h2>
                    </div>
                    <div class="card-body">
                        <canvas id="location_prob-radar_chart" height="150"></canvas>
                    </div>
                </div>
            </div><!--radar Chart -->
            <!-- Pie Chart -->
            <div class="col-lg-6 col-md-6 col-12">
                <div class="card m-1">
                    <div class="card-header">
                        <h2>Pie chart</h2>
                    </div>
                    <div class="card-body">
                        <canvas id="location_prob-pie_chart" height="150"></canvas>
                    </div>
                </div>
            </div><!--Pie Chart -->
        </div>
    </div>
</section>

              </div>
              <div class="tab-pane fade" id="water_prob-tab-pane" role="tabpanel" aria-labelledby="water_prob-tab">

                <section id="water_prob" class="content mt-2">
                        <div class="container-fluid">
                            <div class="row">
                                <!-- Line Chart -->
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="card m-1 card-shadow">
                                        <div class="card-header"><!--or card-title-->
                                            <h2>Line chart</h2>
                                        </div>
                                        <div class="card-body">
                                            <canvas id="signs_prob-line_chart" height="150"></canvas>
                                        </div>
                                    </div>
                                </div><!-- Line Chart -->
                                <!-- Bar Chart -->
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="card m-1">
                                        <div class="card-header">
                                            <h2>Bar chart</h2>
                                        </div>
                                        <div class="card-body">
                                            <canvas id="water_prob-bar_chart" height="150"></canvas>
                                        </div>
                                    </div>
                                </div><!--bar Chart-->
                            </div>

                            <div class="row">
                                <!-- Radar Chart -->
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="card m-1">
                                        <div class="card-header">
                                            <h2>Radar chart</h2>
                                        </div>
                                        <div class="card-body">
                                            <canvas id="water_prob-radar_chart" height="150"></canvas>
                                        </div>
                                    </div>
                                </div><!--radar Chart -->
                                <!-- Pie Chart -->
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="card m-1">
                                        <div class="card-header">
                                            <h2>Pie chart</h2>
                                        </div>
                                        <div class="card-body">
                                            <canvas id="water_prob-pie_chart" height="150"></canvas>
                                        </div>
                                    </div>
                                </div><!--Pie Chart -->
                            </div>
                        </div>
                    </section>

              </div>
              <div class="tab-pane fade" id="overall_prob-tab-pane" role="tabpanel" aria-labelledby="overall_prob-tab">


                <section id="overall_prob" class="content mt-2">
                        <div class="container-fluid">
                            <!--<div class="block-header">
                                <h1>Probabilità segni</h1>
                            </div>-->
                            <div class="row">
                                <!-- Line Chart -->
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="card m-1 card-shadow">
                                        <div class="card-header"><!--or card-title-->
                                            <h2>Line chart</h2>
                                        </div>
                                        <div class="card-body">
                                            <canvas id="overall_prob-line_chart" height="150"></canvas>
                                        </div>
                                    </div>
                                </div><!-- Line Chart -->
                                <!-- Bar Chart -->
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="card m-1">
                                        <div class="card-header">
                                            <h2>Bar chart</h2>
                                        </div>
                                        <div class="card-body">
                                            <canvas id="overall_prob-bar_chart" height="150"></canvas>
                                        </div>
                                    </div>
                                </div><!--bar Chart-->
                            </div>

                            <div class="row">
                                <!-- Radar Chart -->
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="card m-1">
                                        <div class="card-header">
                                            <h2>Radar chart</h2>
                                        </div>
                                        <div class="card-body">
                                            <canvas id="overall_prob-radar_chart" height="150"></canvas>
                                        </div>
                                    </div>
                                </div><!--radar Chart -->
                                <!-- Pie Chart -->
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="card m-1">
                                        <div class="card-header">
                                            <h2>Pie chart</h2>
                                        </div>
                                        <div class="card-body">
                                            <canvas id="overall_prob-pie_chart" height="150"></canvas>
                                        </div>
                                    </div>
                                </div><!--Pie Chart -->
                            </div>
                        </div>
                    </section>

              </div>
            </div><!--tab content-->
          </div><!--2° half-->
      </div> <!--1° row-->


<!--not required here:<div class="row">
  <div class="col-md-12 col-md-offset-4 text-center mt-2 mb-4">
    <button id="confirm-editing-list" class="btn btn-secondary my-1 my-md-0">Conferma inserimento</button>
    <button class="btn btn-secondary my-1 my-md-0">Modifica informazioni</button>
  </div>
</div> 2° row-->

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
