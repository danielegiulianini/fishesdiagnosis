<?php
header('Content-Type: application/json');
include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/connect.php");

session_start();

/*The task of this file is fetching datatbles. They ask for info by contacting this
url trough js file. DataTables could also be fetched filling tables in the dom.
In future I could put this code in the DOM directly.*/

$output = array();
$stmt = null;

$request=$_POST["request"];
$subject=$_POST["subject"];

var_dump($_POST);

switch($subject){
  case "generalInfo":
    switch ($request){
      case "add":
        if (isset($_POST["specie"]) and isset($_POST["nomeRichiedente"])) { /*mandatory fields*/
          /*$dataOraRegistrazione = $_POST["dataOraRegistrazione"];*/

          $nomeVeterinario=$_POST["nomeVeterinario"];
          $nomeRichiedente=$_POST["nomeRichiedente"];
          $telefonoRichiedente=$_POST["telefonoRichiedente"];
          $emailRichiedente=$_POST["emailRichiedente"];
          $sospetto=$_POST["sospetto"];
          $percentualeAffetti=$_POST["percentualeAffetti"];
          $numeroEsaminati=$_POST["numeroEsaminati"];
          $taglia=$_POST["taglia"];
          $eta=$_POST["eta"];
          $sesso=$_POST["sesso"];
          $specie=$_POST["specie"];
          $vasca=$_POST["vasca"]? "" :null; /*No.B: nullable foreign key accepts null but not empty strings (returned by html input)*/
          $origine=$_POST["origine"]? "":null;/*No.B: nullable foreign key accepts null but not empty strings (returned by html input)*/
          $note=$_POST["note"];

          /*validation*/

          /*ddl*/
          $stmt=$conn->prepare("INSERT INTO schedechiamate(nomeVeterinario,nomeRichiedente,telefonoRichiedente,
            emailRichiedente,sospetto,percentualeAffetti,numeroEsaminati,taglia,eta,sesso,specie,vasca,origine,note)
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

          $stmt->bind_param("sssssiiiisssis",
            $nomeVeterinario,
            $nomeRichiedente,
            $telefonoRichiedente,
            $emailRichiedente,
            $sospetto,
            $percentualeAffetti,
            $numeroEsaminati,
            $taglia,
            $eta,
            $sesso,
            $specie,
            $vasca,   /*vasca key is string*/
            $origine, /*origin key is integer*/
            $note
            );
          }
        break;
      case "edit":
      if (isset($_POST["specie"]) and isset($_POST["nomeRichiedente"]) and isset($_POST["idScheda"])) { /*mandatory fields*/
        /*$dataOraRegistrazione = $_POST["dataOraRegistrazione"];*/

        $idScheda = $_POST["idScheda"];
        $nomeVeterinario=$_POST["nomeVeterinario"];
        $nomeRichiedente=$_POST["nomeRichiedente"];
        $telefonoRichiedente=$_POST["telefonoRichiedente"];
        $emailRichiedente=$_POST["emailRichiedente"];
        $sospetto=$_POST["sospetto"];
        $percentualeAffetti=$_POST["percentualeAffetti"];
        $numeroEsaminati=$_POST["numeroEsaminati"];
        $taglia=$_POST["taglia"];
        $eta=$_POST["eta"];
        $sesso=$_POST["sesso"];
        $specie=$_POST["specie"];
        $vasca=$_POST["vasca"]? "" :null; /*No.B: nullable foreign key accepts null but not empty strings (returned by html input)*/
        $origine=$_POST["origine"]? "":null;/*No.B: nullable foreign key accepts null but not empty strings (returned by html input)*/
        $note=$_POST["note"];

        /*validation*/

        /*ddl*/
        $stmt=$conn->prepare("UPDATE schedechiamate SET nomeVeterinario=?,nomeRichiedente=?,telefonoRichiedente=?,
          emailRichiedente=?,sospetto=?,percentualeAffetti=?,numeroEsaminati=?,taglia=?,eta=?,sesso=?,specie=?,vasca=?,origine=?,note=? WHERE idScheda=?");

        $stmt->bind_param("sssssiiiisssisi",
          $nomeVeterinario,
          $nomeRichiedente,
          $telefonoRichiedente,
          $emailRichiedente,
          $sospetto,
          $percentualeAffetti,
          $numeroEsaminati,
          $taglia,
          $eta,
          $sesso,
          $specie,
          $vasca,   /*vasca key is string*/
          $origine, /*origin key is integer*/
          $note,
          $idScheda
          );
        }
    }
    break;
  case "presentSigns":
    switch ($request){
      case "add":
        /*validation*/
        $stmt= $conn->prepare("");
        $stmt->bind_param("", $a1, $a2);
        break;
      case "edit":
        break;
    }
    break;
  case "absentSigns":
    switch ($request){
      case "add":
        $sql = "";
        break;
      case "edit":
        break;
    }
    break;
  case "measurements":
    switch ($request){
      case "add":
        $sql = "";
        break;
      case "edit":
        break;
    }
    break;
  case "events":
    switch ($request){
      case "add":
        $sql = "";
        break;
      case "edit":
        break;
    }
    break;
  case "conclusion":
    switch ($request){
      case "add":
        $sql = "";
        break;
      case "edit":
        break;
    }
    break;
}

if (!is_null ($stmt)){ //if fields required are not set this prevents from executing
  $stmt->execute();
}

$conn->close();

print json_encode($output);

?>