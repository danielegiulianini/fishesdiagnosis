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

  case "signs":
    switch ($request){
      case "add":
        /*this is not used*/
        break;
      case "edit":
        /*Avrei potuto fare il demux in js, lasciando lì tutta la complessità per la scelta di inserire in una
        o nell'altra tabella a seconda del valore dei radios. Così facendo avrei avuto la parte server banale.*/

        if (isset($_POST["idScheda"]) and isset($_POST["idSegno"]) and isset($_POST["presences"])) { /*mandatory fields*/

          $idScheda = $_POST["idScheda"];

          $arrayIdSegni = $_POST["idSegno"];
          $arrayPresences = $_POST["presences"];

          $arrayPercentuali = !isset($_POST["percentages"]) ? null : $_POST["percentages"];

          /*validation*/


          /*ddl*/
          /*1.cleaning segnipresenti e segniassenti tables*/
          $stmt=$conn->prepare("DELETE from segnipresenti where idScheda=?");
          $stmt->bind_param("i", $idScheda);
          $stmt->execute();

          $stmt=$conn->prepare("DELETE from segniassenti where idScheda=?");
          $stmt->bind_param("i", $idScheda);
          $stmt->execute();

          /*2.inserting into segnipresenti e segniassenti tables according to values of radios*/
          for ($i=0; $i<count($arrayIdSegni); $i++){
            switch($arrayPresences[$i]){
              case "yes":
                $stmt=$conn->prepare("INSERT into segnipresenti(idSegno, idScheda, percentuale) values(?, ?, ?)");
                $stmt->bind_param("iii",$arrayIdSegni[$i], $idScheda, $arrayPercentuali[$i]);
                break;
              case "no":
                $stmt=$conn->prepare("INSERT into segniassenti(idSegno, idScheda) values(?, ?)");
                $stmt->bind_param("ii",$arrayIdSegni[$i], $idScheda);
                break;
              default:/*dont'know : do nothing*/
            }
          }

        }
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
