<?php
$servername="localhost";
$username="root";
$password="";
$db="unifood";

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

/*per tutte le query potrei:
1. mettere il try catch alla fine di ogni script ed abilitare gli errori con mysqli_report(MYSQLI_REPORT_ALL)
2. fare una libreria mia con tutte funzioni che wrappano le funzioni mysqli ma in + lanciano le eccezioni (con throw)
 (in questo caso non c'è più bisogno di mysqli_report(MYSQLI_REPORT_ALL);)
3. lasciare la funzione check ma che come primo parametro ha la chiamata a funzione e non conn->error come è ora.
  (è sostanzialmente una versione ad errori del pto 2. ma unificata, basta una sola funzione, non rapporto 1 a 1!),
  ma devo includere l'exit nella funzione(non avendo le eccezioni)
4. fareversione unificata con però le eccezioni, ma non ha senso, perché dovrei comunque avere un try catch nel corpo principale

sunto: la cosa migliore è la 1. perché dovrei comunque ( per interrompere il lavoro sul db al 1o errore) avere un try-catch
nel corpo che chiama le funzioni
*/
?>
