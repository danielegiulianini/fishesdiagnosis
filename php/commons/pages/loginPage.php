
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
    @media (min-width: 768px) { /*required for pulling footer to thebottom of the page*/
      main{
        height: 94%;
      }
    }
    html, body{
       height: 94%;
    }
    .big-icon{
        font-size:270%;
    }
  </style>

</head>
<body>
<?php include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/layout/loginPageHeader.php"); ?><!-- shared navbar-->

  <main role="main" class="mt-5">
  <div class="container-fluid">
    <div class="row mb-4 mb-md-0">
      <div class="col-md-9 mb-4 mb-md-0 pr-md-0">
        <div class="container-fluid d-flex align-items-center justify-content-center h-100 w-100">
          <!--<div class="card">
            <div class="card-body">
              <div class="card-title font-weight-bolder text-center lead">Informazioni generali scheda</div>-->
                <div class="jumbotron w-100 mb-0">
                  <h1 class="display-4" style="font-size:260%!important">FishesDiagnosis</h1>
                  <p class="lead">Non tutti sani come pesci.</p>
                  <hr class="my-4">
                  <p>Sistema di supporto alla diagnosi della fauna marina.</p>
                  <p class="lead">
                    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                  </p>
               </div><!--jumbotron-->
            <!-- </div><!--end card-body-->
          <!-- </div><!--end card-->
    <!--  </div>-->
    </div> <!--end 1° half of screen-->
      <!--un margine visibile solo per i mobile realizzato tramite mb-4 mb-md-0-->
</div>
      <div class="col-md-3 p-0">
        <div class="container-fluid d-flex align-items-center h-100 w-100 pl-md-0">
          <div class="card mx-auto text-center login-card">
            <div class="card-body">
              <h5 class="card-title">Benvenuto!</h5>
              <div class="text-center">
                <span id="profileImg" class="d-block fas fa-user mt-4 mb-4 big-icon"></span>
              </div>

              <?php
              if (isset($_SESSION["errors"]) && !empty($_SESSION["errors"])){ //forse era più gestibile usare la get
                echo '<div id="errorsDiv" class="alert alert-danger">'.$_SESSION["errors"].'</div>';
              }
              ?> <!--should be filled by server-->

              <form class="needs-validation" method="post" action="../../commons/checkInputLogin.php" novalidate><!--novalidate cause I want to use my validation, not the browser default-->
                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" class="form-control" id="email" name=email placeholder="Email" required autofocus/>

                    <div class="invalid-feedback">Email necessaria.</div>
                  </div>
                  <div class="form-group mt-2">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required/>

                    <div class="invalid-feedback">Password necessaria.</div>
                  </div>
                  <button type="submit" class="btn btn-primary btn-block mt-3 mb-3">Login</button>
                  <a href="./resetPasswordPage.php" class="small text-center">Password dimenticata? Clicca qui.</a><br>
                  <a href="./registrationPage.php" class="small text-center">Non sei registrato? Registrati.</a>
              </form>
            </div>
          </div>
        </div><!--container-fluid-->
      </div><!--2° half-->
    </div><!--row-->
    <!--un margine visibile solo per i mobile realizzato tramite mb-4 mb-md-0-->

  </div><!--container-fluid-->

  </main>

  <!--Modal for updating existing report general info-->
  <?php include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/layout/editReportGeneralInfoModal.php");?>

  <?php include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/layout/footer.php");?>
<body>
