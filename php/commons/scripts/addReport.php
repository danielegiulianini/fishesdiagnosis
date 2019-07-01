<?php
header('Content-Type: application/json');
session_start();

/*in post c'è la form serializzata*/

$output = "";

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
$vasca, /*vasca key is string*/
$origine, /*origin key is integer*/
$note
);
  $stmt->execute();

}

print json_encode($output);
?>
