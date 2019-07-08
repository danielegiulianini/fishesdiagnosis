<?php
session_start();

$_SESSION = array();// Recupera i parametri di sessione.
$params = session_get_cookie_params();  // Elimina tutti i valori della sessione.
setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]); // Cancella i cookie attuali.
session_destroy();  // Cancella la sessione.

header("Location: /fishdiagnosis/php/loginPage.php");  //riporta alla landing-page
?>
