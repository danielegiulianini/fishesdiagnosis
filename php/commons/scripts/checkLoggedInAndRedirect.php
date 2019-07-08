<?php
session_start();

if (!isset($_SESSION["idUtente"])){
  /*qui ho bisogno di un indirizzo assoluto perché questo file viene incluso in file situati in directory diverse*/
    header("Location: /fishesdiagnosis/php/commons/pages/loginPage.php");
}

?>
