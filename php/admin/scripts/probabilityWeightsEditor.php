<?php
header('Content-Type: application/json');
include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/connect.php");

session_start();

$output = array();

var_dump($_POST); //in post c'è la form serializzata

if (isset($_POST["nomeProbabilitaAssociata"]) and isset($_POST["valore"])) { /*mandatory fields*/

  $nomeProbabilitaAssociata=$_POST["nomeProbabilitaAssociata"];
  $valore=$_POST["valore"];

  /*validation*/

  /*dml*/
  $stmt=$conn->prepare("INSERT INTO pesi(nomeProbabilitaAssociata,valore) VALUES (?,?)");

  $stmt->bind_param("si", $nomeProbabilitaAssociata, $valore);
}

if (!is_null ($stmt)){
  $stmt->execute();
}

$conn->close();

print json_encode($output);

?>
