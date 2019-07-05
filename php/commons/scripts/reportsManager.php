<?php
header('Content-Type: application/json');
include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/connect.php");

session_start();

/*in post c'è la form serializzata*/

$output = array();
$stmt = null;

$request=$_POST["request"];
$subject=$_POST["subject"];

var_dump($_POST);

switch($subject){
  case "generalInfo":
    switch ($request){
      case "add":
        if (isset($_POST["specie"]) and isset($_POST["nomeRichiedente"])) {
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
          $vasca=$_POST["vasca"];
          $origine=$_POST["origine"];
          $note=$_POST["note"];

          /*validation*/

          /*ddl*/
echo "ciaoooo";

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
        /*validation*/
        $stmt= $conn->prepare('UPDATE schedechiamate SET percorsoImmagine=?, descrizione=?, ingredienti=?, vegano=?, disponibile=?, prezzoListino=?, prezzoVendita=?, nome=?, categoriaProdotto=?, celiaco=? WHERE ID= ?');
        $stmt->bind_param("", $a1, $a2);
        break;
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
