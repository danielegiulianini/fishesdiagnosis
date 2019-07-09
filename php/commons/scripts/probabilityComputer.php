<?php
header('Content-Type: application/json');

include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/connect.php");

include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/scripts/checkLoggedInAndRedirect.php");

$output = array();
$stmt = null;

$request=$_GET["request"];
/*
var_dump($_POST); //in post c'è la form serializzata

var_dump($_GET);*/



$sql="";

switch($request){
  case "signs_line":

  if(isset($_GET["idScheda"])){/*field required*/

    $sql = "SELECT `Sottoquery Patologia Segni riscontrati unito Segni Teorici`.idStatoPat2, statipatologici.nome, `Sottoquery Patologia Segni riscontrati unito Segni Teorici`.specie, Avg(1-Abs(`Sottoquery Patologia Segni riscontrati unito Segni Teorici`.grado_freq-`Sottoquery Patologia Segni riscontrati unito Segni Teorici`.prob)) AS probabilita
FROM (

select * from (


    SELECT DISTINCT p1.specie, p1.idStatoPat1, p1.idSegno, p1.prob, p1.idStatoPat2, ifnull(p2.gradoFrequenza,0) AS grado_freq
FROM (SELECT s2.specie, s2.idStatoPat1, s2.idSegno, s2.prob, p3.idStatoPat2 FROM (SELECT s.specie, s.idStatoPat AS idStatoPat1, s.idSegno, s.prob FROM (SELECT p.idStatoPat, p.specie, p.idSegno, p.gradoFrequenza, sep.percentuale/100 AS prob
FROM (segnipresenti AS sep INNER JOIN schedechiamate AS sc ON sep.idScheda = sc.idScheda) INNER JOIN presentazioni AS p ON (p.idSegno=sep.idSegno) AND (p.specie = sc.specie)
WHERE sep.idScheda = ?
) AS s) AS s2 INNER JOIN (SELECT specie, idStatoPat AS idStatoPat2 FROM Presentazioni)  AS p3 ON s2.specie = p3.specie)  AS p1 LEFT JOIN presentazioni AS p2 ON (p1.idStatoPat2 = p2.idStatoPat) AND (p1.idSegno = p2.idSegno) AND (p1.specie = p2.specie)



) as psr
UNION (

select p2.specie, p1.idStatoPat1, p2.idSegno, ifnull(p1.prob, 0), p2.idStatoPat, ifnull(p2.gradoFrequenza, 0) as grado_freq
from (

    SELECT DISTINCT p1.specie, p1.idStatoPat1, p1.idSegno, p1.prob, p1.idStatoPat2, ifnull(p2.gradoFrequenza,0) AS grado_freq
FROM (SELECT s2.specie, s2.idStatoPat1, s2.idSegno, s2.prob, p3.idStatoPat2 FROM (SELECT s.specie, s.idStatoPat AS idStatoPat1, s.idSegno, s.prob FROM (SELECT p.idStatoPat, p.specie, p.idSegno, p.gradoFrequenza, (sep.percentuale/100) AS prob
FROM (segnipresenti AS sep INNER JOIN schedechiamate AS sc ON sep.idScheda = sc.idScheda) INNER JOIN presentazioni AS p ON (p.idSegno=sep.idSegno) AND (p.specie = sc.specie)
WHERE sep.idScheda = ?
) AS s)  AS s2 INNER JOIN (SELECT specie, idStatoPat AS idStatoPat2 FROM Presentazioni)  AS p3 ON s2.specie = p3.specie)  AS p1 LEFT JOIN presentazioni AS p2 ON (p1.idStatoPat2 = p2.idStatoPat) AND (p1.idSegno = p2.idSegno) AND (p1.specie = p2.specie)
)


    as p1 right join presentazioni p2 on (p1.idStatoPat2 = p2.idStatoPat and p1.idSegno = p2.idSegno and p1.specie = p2.specie) )
ORDER BY idStatoPat2


) as `Sottoquery Patologia Segni riscontrati unito Segni Teorici` INNER JOIN statipatologici ON `Sottoquery Patologia Segni riscontrati unito Segni Teorici`.idStatoPat2=statipatologici.idStatoPat
GROUP BY `Sottoquery Patologia Segni riscontrati unito Segni Teorici`.idStatoPat2, `Sottoquery Patologia Segni riscontrati unito Segni Teorici`.specie, statipatologici.nome
ORDER BY Avg(1-Abs(`Sottoquery Patologia Segni riscontrati unito Segni Teorici`.grado_freq-`Sottoquery Patologia Segni riscontrati unito Segni Teorici`.prob)) DESC";


    $stmt=$conn->prepare($sql);
    $stmt->bind_param("ii", $idScheda, $idScheda);

    $stmt->execute();

    $result=$stmt->get_result();
    while($row=$result->fetch_assoc()){
      $output[]=$row; //contiene: idStatoPat2, nome, specie, probabilita
    }

  }
    break;
}

if (!is_null ($stmt)){ //if fields required are not set, this prevents from executing
  //$stmt->execute();
}

$conn->close();

print json_encode($output);

?>
