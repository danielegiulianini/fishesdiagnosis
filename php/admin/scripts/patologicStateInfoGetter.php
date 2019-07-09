<?php
header('Content-Type: application/json');

include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/scripts/checkLoggedInAndRedirect.php");

include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/connect.php");


/*The task of this file is fetching datatbles od viewReportPage (general info table
 is fetched directly in viewReportPage because is styling is particular and because
 of that it is not a datatable). datatables ask for info by contacting this
 url trough thier js file. DataTables could also be fetched filling tables in the dom.
In future I could put this code in the DOM directly.*/

//not used
function fillOutputWithPrepStatResults($sql, $conn, &$output){
  $stmt=$conn->prepare($sql." where idScheda = ?");
  $stmt->bind_param("i", $idScheda);

  $stmt->execute();

  $result=$stmt->get_result();
  while($row=$result->fetch_assoc()){
    $output[]=$row;
  }

}

function fillOutputWithQueryResults($sql, $conn, &$output){
  $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
      $row["action"]="";
      $output[]=$row;
    }
}

$output = array();
$stmt = null;

$subject=$_POST["subject"];
$idScheda = $_POST["idStatoPat"];

//var_dump($_POST);

switch($subject){
  case "present_signs":
//echo "select * from segnipresenti inner join segni on segni.idSegno=segnipresenti.idSegno where segnipresenti.idScheda = ".$idScheda;
    fillOutputWithQueryResults("select * from statipatologici inner join presentazioni on statipatologici.idStatoPat=presentazioni.idStatoPat where statipatologici.idStatoPat = ".$idStatoPat, $conn, $output);//yes need of join

    break;
  case "measurements":

    fillOutputWithQueryResults("select * from misurazioni where idScheda = ".$idScheda, $conn, $output); //no need of join

    break;

  case "events":

      fillOutputWithQueryResults("select * from eventi where idScheda = ".$idScheda, $conn, $output); //no need of join

  break;

  case "conclusions":

    fillOutputWithQueryResults("select * from conclusioni where idScheda = ".$idScheda, $conn, $output); //no need of join

    break;
}

if (!is_null ($stmt)){ //if fields required are not set this prevents from executing
  $stmt->execute();
}

$conn->close();

print json_encode($output);

?>
