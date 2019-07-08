<?php
header('Content-Type: application/json');

include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/connect.php");

session_start();

$output = array();
$stmt = null;

$request=$_POST["request"];

var_dump($_POST); //in post c'è la form serializzata
$sql="";

switch($request){
  case "signs_line":

    /*$stmt=$conn->prepare($sql);
    $stmt->bind_param("ii", $idScheda, $idScheda);

    $stmt->execute();

    $result=$stmt->get_result();
    while($row=$result->fetch_assoc()){
      $output[]=$row; //contiene: idStatoPat2, nome, specie, probabilita
    }*/
    break;
}

if (!is_null ($stmt)){ //if fields required are not set, this prevents from executing
  $stmt->execute();
}

$conn->close();

print json_encode($output);

?>
