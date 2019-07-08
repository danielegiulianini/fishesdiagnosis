<?php
header('Content-Type: application/json');
include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/connect.php");

session_start();

$output = array();

var_dump($_POST); //in post c'è la form serializzata

if (isset($_POST["pesi"])) { /*mandatory fields*/

  $arrayPesi = $_POST["pesi"];

  foreach($arrayPesi as $item){

    if (isset($item["nomeProbabilitaAssociata"]) and isset($item["valore"]))

      $nomeProbabilitaAssociata=$item["nomeProbabilitaAssociata"];
      $valore=$item["valore"];

      /*validation*/

      /*dml*/
      $stmt=$conn->prepare("INSERT INTO pesi(nomeProbabilitaAssociata,valore) VALUES (?,?)");

      echo "INSERT INTO pesi(nomeProbabilitaAssociata,valore) VALUES ( $item['nomeProbabilitaAssociata'],
      $item['valore'])";

      $stmt->bind_param("si", $item["nomeProbabilitaAssociata"], $item["valore"]);

      if (!is_null ($stmt)){
      //  $stmt->execute();
      }
  }
}



$conn->close();

print json_encode($output);

?>
