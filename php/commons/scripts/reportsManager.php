<?php
session_start();

$request=$_POST["request"];
$subject=$_POST["subject"];


switch($subject){
  case "generalInfo":
    switch ($request){
      case "add":
        /*validation*/
        $stmt=$conn->prepare("INSERT INTO schedechiamate (categoriaRistorante, IDDettaglioFornitore) VALUES (?,?)");
        $stmt->bind_param("", $a1, $a2);
        break;
      case "edit":
        /*validation*/
        $stmt= $conn->prepare('UPDATE schedechiamate SET percorsoImmagine=?, descrizione=?, ingredienti=?, vegano=?, disponibile=?, prezzoListino=?, prezzoVendita=?, nome=?, categoriaProdotto=?, celiaco=? WHERE ID= ?');
        $stmt->bind_param("", $a1, $a2);
        break;
    }
    break;
  case "presentSigns":
    switch ($request){
      case "add":
        /*validation*/
        $stmt= $conn->prepare("");
        $stmt->bind_param("", $a1, $a2);
        break;
      case "edit":
        break;
    }
    break;
  case "absentSigns":
    switch ($request){
      case "add":
        $sql = ""
        break;
      case "edit":
        break;
    }
    break;
  case "measurements":
    switch ($request){
      case "add":
        $sql = ""
        break;
      case "edit":
        break;
    }
    break:
  case "events":
    switch ($request){
      case "add":
        $sql = ""
        break;
      case "edit":
        break;
    }
    break;
  case "conclusion":
    switch ($request){
      case "add":
        $sql = ""
        break;
      case "edit":
        break;
    }
    break;
}

$stmt->execute();

$conn->close();

?>
