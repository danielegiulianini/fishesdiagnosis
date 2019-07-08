<?php
session_start();

include($_SERVER['DOCUMENT_ROOT']."/fishesdiagnosis/php/commons/connect.php");

if (checkSessionElapsedOrCredentialsCorrupted($conn)){
  /*qui ho bisogno di un indirizzo assoluto perché questo file viene incluso in file situati in directory diverse*/
    header("Location: /fishesdiagnosis/php/commons/pages/loginPage.php");
    exit;
}

function checkSessionElapsedOrCredentialsCorrupted($conn) {
/*questa funzione controlla che:
1. la sessione non sia scaduta (bastava un booleano logged)
2. i dati che mantiene non siano stati corrotti da qualcuno*/

  if(isset($_SESSION['idUtente'])) {
    $user_id = $_SESSION['idUtente'];
     /*if ($stmt = $conn->prepare("SELECT password FROM utenti WHERE IDUtente = ? LIMIT 1")) {
        $stmt->bind_param('i', $user_id); // esegue il bind del parametro '$user_id'.
        $stmt->execute(); // Esegue la query creata.
        $stmt->store_result();

        error_log("dentro prepare", 3, "error.txt");
        if($stmt->num_rows == 1) { // se l'utente esiste
           $stmt->bind_result($password); // recupera le variabili dal risultato ottenuto.
           $stmt->fetch();
           $login_check = hash('sha512', $password.$user_browser);  //cripta login_string
           if($login_check == $login_string) {
              return false; //nessun problema
           } else {
             error_log("pass errata", 3, "error.txt");
              return true; //password errata
           }
        } else {
          error_log("email errata", 3, "error.txt");
            return true; //username errao
        }
     } else {
       error_log("prepard erraro", 3, "error.txt");
        return true; //errore preparazione prepared statement
     }*/
   } else {
     return true;  //sessione scaduta
   }
}

?>
