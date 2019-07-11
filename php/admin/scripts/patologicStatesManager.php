<?php
header('Content-Type: application/json');
include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/connect.php");

include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/scripts/checkLoggedInAndRedirect.php");

$output = array();
$stmt = null;

$request=$_POST["request"];
$subject=$_POST["subject"];

//var_dump($_POST); //in post c'è la form serializzata

switch($subject){
  case "generalInfo":
    switch ($request){
      case "add":
        if (isset($_POST["nomeStato"]) and isset($_POST["tipoStato"])) { /*mandatory fields*/
          $nomeStato=$_POST["nomeStato"];
          $tipoStato=$_POST["tipoStato"];

          /*validation*/

          /*ddl*/
          $stmt=$conn->prepare("INSERT INTO statipatologici(nome,tipologia)
            VALUES (?,?)");

          $stmt->bind_param("ss",
            $nomeStato,
            $tipoStato
          );
          $stmt->execute();

          $last_id = $conn->insert_id;
          $output["idStatoPat"] = $last_id;
        }
        break;
      case "edit":
      if (isset($_POST["idStato"]) and isset($_POST["nomeStato"]) and isset($_POST["tipoStato"])) { /*mandatory fields*/

        $idStatoPat = $_POST["idStato"];
        $nome=$_POST["nomeStato"];
        $tipologia=$_POST["tipoStato"];

        //validation

        //dml
        $stmt=$conn->prepare("UPDATE statipatologici SET nome=?,tipologia=? WHERE idStatoPat=?");

        $stmt->bind_param("ssi",
          $nome,
          $tipologia,
          $idStatoPat
        );

        $stmt->execute();
      }
      break;
    }
    break;

  case "signs":
    switch ($request){
      case "add":
        /*this is not used*/
        break;
      case "edit":
        /*Avrei potuto fare il demux in js, lasciando lì tutta la complessità per la scelta di inserire in una
        o nell'altra tabella a seconda del valore dei radios. Così facendo avrei avuto la parte server più semplice.*/

        if (isset($_POST["idStatoPat"]) and isset($_POST["specie"]) and isset($_POST["idSegno"]) and isset($_POST["presences"])) { /*mandatory fields*/

          $idStatoPat = $_POST["idStatoPat"];
          $specie = $_POST["specie"];
          $arrayIdSegni = $_POST["idSegno"];
          $arrayPresences = $_POST["presences"];

          $arrayPercentuali = !isset($_POST["percentages"]) ? null : $_POST["percentages"];//in 'percentuale' della tabella presentazione si può inserire null, ma non empty string

          //validation


          //dml
          //1.cleaning presentazioni table
          $stmt=$conn->prepare("DELETE from presentazioni where idStatoPat=? and specie=?");
          $stmt->bind_param("is", $idStatoPat, $specie);
          $stmt->execute();

          //2.inserting into presentazioni table according to values of radios savd in presences
          for ($i=0; $i<count($arrayIdSegni); $i++){
            switch($arrayPresences[$i]){
              case "yes":
                $stmt=$conn->prepare("INSERT into presentazioni(idStatoPat, idSegno, specie, gradoFrequenza) values(?, ?, ?, ?)");
                $stmt->bind_param("iisd",$idStatoPat, $arrayIdSegni[$i], $specie, $arrayPercentuali[$i]);
                $stmt->execute();
                break;
              case "no":
                //do nothing
                break;
              default:
                //do nothing
            }
          }

        }
        break;
    }
    break;

  /*case "measurement":
    switch ($request){
      case "add":
        if (isset($_POST["caratteristicaAcqua"]) and isset($_POST["valore"]) and isset($_POST["idScheda"])) {

          $idScheda = $_POST["idScheda"];
          $caratteristicaAcqua = $_POST["caratteristicaAcqua"];
          $valore = $_POST["valore"];

          //validation


          //dml
          $stmt=$conn->prepare("INSERT into misurazioni(idScheda, caratteristicaAcqua, valore) values(?, ?, ?)");
          $stmt->bind_param("isi", $idScheda, $caratteristicaAcqua, $valore);
          $stmt->execute();
        }
        break;
      case "edit":
        break;
    }
    break;

  case "event":
    switch ($request){
      case "add":
        if (isset($_POST["dataEvento"]) and isset($_POST["dataComparsaSegni"]) and isset($_POST["idScheda"])) {//mandatory fields (tipologia temp removed as db is empty and it is a foreign key)

          $idScheda = $_POST["idScheda"];//mandatory fields
          $dataEvento = $_POST["dataEvento"];
          $dataComparsaSegni = $_POST["dataComparsaSegni"];
          //$tipologia = $_POST["tipologia"]; temp moved in optional (db is empty)

          //optional fields
          $tipologia = !isset($_POST["tipologia"])?null:$_POST["tipologia"];
          $provenienza = !isset($_POST["provenienza"])? null :$_POST["provenienza"]; //No.B: nullable foreign key accepts null but not empty strings (returned by html input)
          $note =!isset($_POST["note"])?null : $_POST["note"];//No.B: nullable foreign key accepts null but not empty strings (returned by html input)

          //validation

          //dml
          $stmt=$conn->prepare("INSERT into eventi(dataEvento,dataComparsaSegniClinici, tipologia, idScheda, provenienza, note) values(?, ?, ?, ?, ?, ?)");
          $stmt->bind_param("sssiis", $dataEvento, $dataComparsaSegni, $tipologia,$idScheda, $provenienza, $note);//dates want string format
          $stmt->execute();
        }
        break;
      case "edit":
        break;
    }
    break;

  case "conclusion":
    switch ($request){
      case "add":
        if (isset($_POST["idScheda"]) and isset($_POST["risposta"])) {//mandatory fields

          //mandatory fields
          $idScheda = $_POST["idScheda"];
          $risposta = $_POST["risposta"];

          //optional fields
          $evoluzione = !isset($_POST["evoluzione"])?null:$_POST["evoluzione"];

          //validation

          //dml
          $stmt=$conn->prepare("INSERT into conclusioni(idScheda, risposta, evoluzione) values(?, ?, ?)");
          $stmt->bind_param("iss", $idScheda, $risposta, $evoluzione);
          $stmt->execute();
        }
        break;
      case "edit":
        break;
    }
    break;*/
}


if (!is_null ($stmt)){ //if fields required are not set, this prevents from executing
  //$stmt->execute();
}

$conn->close();

print json_encode($output);

?>
