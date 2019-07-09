<?php
$servername="localhost";
$username="root";
$password="";
$db="patologiepesci";

ini_set('display_errors', 1); //fondamentali per debug, da disattivare con il deploy
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//mysqli_report(MYSQLI_REPORT_ALL); //importante sia per degun ma anche per trycatch, va mantenuto anche dopo il deploy
mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX); //uso qusto per liberarmi da warning troppo aggressivi come quello che si lamentavoa perché non c'era un index sulla query!!

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
  echo '<div class="alert alert-warning">'.$conn->connect_error.'</div>';
  exit;
}

$conn->set_charset("utf8"); //fondamentale per encoding caratteri

//include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/connect.php");



$conn2 = new mysqli("localhost", "root", "", "pat");

if ($conn2->connect_error){
  echo '<div class="alert alert-warning">'.$conn2->connect_error.'</div>';
  exit;
}

$conn2->set_charset("utf8"); //fondamentale per encoding caratteri






  $sql="select * from presentazioni";
  $result = $conn2->query($sql);
  while($row = $result->fetch_assoc()) {
    if ($row["specie"]!="cefalo"){
      //$sql = "insert into presentazioni(idStatoPat, specie,idSegno, gradoFrequenza) values (".$row["idStatoPat"].", ".$row["specie"].", ".$row["idSegno"].", ".$row["grado_frequenza"].")";
    /*  $sql= "insert into presentazioni(idStatoPat, specie,idSegno, gradoFrequenza) values (".$row["idStatoPat"].", '".$row["specie"]."', ".$row["idSegno"].", ".$row["grado_frequenza"].") WHERE NOT EXISTS (
    SELECT * FROM presentazioni WHERE idStatoPat = " .$row["idStatoPat"]." and specie='".$row["specie"]."' and idSegno =".$row["idSegno"].")";
      */
      $sql = "insert into presentazioni(idStatoPat, specie,idSegno, gradoFrequenza) values (".$row["idStatoPat"].", '".$row["specie"]."', ".$row["idSegno"].", ".$row["grado_frequenza"].")";
      $conn -> query($sql);
    }
  }
?>
