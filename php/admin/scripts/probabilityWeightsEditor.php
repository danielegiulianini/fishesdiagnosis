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
      $stmt=$conn->prepare("UPDATE pesi SET valore = ? where nomeProbabilitaAssociata=?");
      echo "update pesi set valore= ".$item['valore']." where nomeProbabilitaAssociata = ".$item['nomeProbabilitaAssociata'];

      $stmt->bind_param("ds", $item["valore"], $item["nomeProbabilitaAssociata"]);

      if (!is_null ($stmt)){
        $stmt->execute();
      }
  }
}



$conn->close();

print json_encode($output);

?>
