<?php
/*in this page i must perform regstration and login check*/
session_start();

include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/connect.php");

/*var_dump($_POST);*/

$errors = "";

if(isset($_POST["request"])and !is_null($_POST["request"]) and $_POST["request"]=="login"){

  /*validation*/
	/*if(!isset($_POST["nome"]) || strlen($_POST["nome"]) < 2){
		$errors .= "Nome è obbligatorio e deve essere almeno 2 caratteri <br/>";
	}

	if(!isset($_POST["cognome"]) || strlen($_POST["cognome"]) < 2){
		$errors .= "Cognome è obbligatorio e deve essere almeno 2 caratteri";
	}

	if(!isset($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
		$errors .= "Email è obbligatoria e deve essere valida <br/>";
	}*/

	if(strlen($errors) == 0){

    $username = $_POST["l_username"];
		$password = $_POST["l_password"];

    if ($stmt = $conn->prepare("SELECT idUtente, password, tipoUtente FROM utenti WHERE username = ? LIMIT 1")) { //prepared statement difende da attacco sql injection
      $stmt->bind_param('s', $username);
      $stmt->execute();
      $stmt->store_result();
      $stmt->bind_result($user_id, $db_password, $userType);
      $stmt->fetch();

       if($db_password == $password) { // Verifica che la password memorizzata nel database corrisponda alla password fornita dall'utente.

         $_SESSION['idUtente'] = $user_id; //inzio la sessione->IMPORTANTE, questi dati poi non saranno da richiedere al server nell chiamate ad ajax
         $_SESSION["tipoUtente"]= $userType;

         switch($userType){
            case "admin":
              header("Location: /fishesdiagnosis/php/admin/adminStartPage.php");  /*to update to dashboard*/
              break;
            case "utente":
              header("Location: /fishesdiagnosis/php/user/userStartPage.php");  /*to update to dashboard*/
//echo "Location:".$_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/user/pages/userStartPage.php";
//exit;
              break;
          }


       } else {
         $errors.="Password errata.";
       }
    } else {
      $errors.="username errato.";
    }

		$isInserted = $stmt->execute();

		$stmt->close();
	}
}


/*to eventually put in registrationPage if I will move regitstration from modal to its page*/
if(isset($_POST["request"]) and !is_null($_POST["request"]) and $_POST["request"]=="registration"){

	$errors = "";

  /*validation*/
	/*if(!isset($_POST["r_username"]) || strlen($_POST["nome"]) < 2){
		$errors .= "Nome è obbligatorio e deve essere almeno 2 caratteri <br/>";
	}

	if(!isset($_POST["cognome"]) || strlen($_POST["cognome"]) < 2){
		$errors .= "Cognome è obbligatorio e deve essere almeno 2 caratteri";
	}

	if(!isset($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
		$errors .= "Email è obbligatoria e deve essere valida <br/>";
	}*/

	if(strlen($errors) == 0){

    $username = $_POST["r_username"];
		$password = $_POST["r_password"];
		$tipoUtente = "utente";

    /*check if username already in use*/
    $stmt=$conn->prepare("SELECT * FROM utenti WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows==0 ){
      $stmt = $conn->prepare("INSERT INTO utenti (username, password, tipoUtente) VALUES (?, ?, ?)");
  		$stmt->bind_param("sss", $username, $password, $tipoUtente);

  		$isInserted = $stmt->execute();
  		if(!$isInserted){
  			$insertError = $stmt->error;
  		}
      $user_id = $conn->insert_id;  //get last id inserted in a auto_increment table column

      $_SESSION['idUtente'] = $user_id; //inzio la sessione->IMPORTANTE, questi dati poi non saranno da richiedere al server nell chiamate ad ajax
      $_SESSION["tipoUtente"]= "utente";
    } else {
      $errors.="username gia' in uso.";
    }

    $stmt->close();
	}

  print json_encode($errors);
  exit;
}

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

  <script src="http://localhost:8081/fishesdiagnosis/js/commons/loginPage.js"></script>
  <script src="/fishesdiagnosis/js/commons/encFunctions.js"></script>


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
    <?php
      if(strlen($errors) != 0){
    ?>
      <div class="alert alert-danger alert-php" role="alert">
  			Errore durante l'inserimento.
  			<p><?=$errors?></p>

    <?php
      }
    ?>
		</div>
    <div class="row mb-4 mb-md-0">
      <div class="col-md-9 mb-4 mb-md-0 pr-md-0">
        <div class="container-fluid d-flex align-items-center justify-content-center h-100 w-100">
          <div class="jumbotron w-100 mb-0">
                  <h1 class="display-4" style="font-size:260%!important">FishesDiagnosis</h1>
                  <p class="lead">Non tutti sani come pesci.</p>
                  <hr class="my-4">
                  <p>Sistema di supporto alla diagnosi della fauna marina.</p>
                  <p class="lead">
                    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                  </p>
               </div><!--jumbotron-->

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
              <form class="needs-validation" method="post" action=""><!--novalidate cause I want to use my validation, not the browser default-->
                  <input type="hidden" name="request" value="login"/>

                  <div class="form-group">
                    <label for="l_username" class="sr-only">Username</label>
                    <input type="text" class="form-control" id="l_username" name="l_username" placeholder="drPesci" required autofocus/>

                    <div class="invalid-feedback">Username necessaria.</div>
                  </div>
                  <div class="form-group mt-2">
                    <label for="l_password" class="sr-only">Password</label>
                    <input type="password" class="form-control" id="l_password" name="l_password" placeholder="Password" required/>

                    <div class="invalid-feedback">Password necessaria.</div>
                  </div>
                  <button type="submit" class="btn btn-primary btn-block mt-3 mb-3">Login</button>
                  <!--<a href="./resetPasswordPage.php" class="small text-center">Password dimenticata? Clicca qui.</a><br>-->
                  <a href="#add-user-modal" class="small text-center" data-toggle="modal" data-target="#add-user-modal">Non sei registrato? Registrati qui.</a>
              </form>
            </div>
          </div>
        </div><!--container-fluid-->
      </div><!--2° half-->
    </div><!--row-->
    <!--un margine visibile solo per i mobile realizzato tramite mb-4 mb-md-0-->

  </div><!--container-fluid-->

  </main>


  <?php include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/layout/footer.php");?>
<body>
