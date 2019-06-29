$(document).ready(function() {
  //interrogo una volta il server con ajax per reperire gli attributi della tabella (questa cosa la potevo fare anche con php nella pagina)
  table = $('#example').DataTable({
    "responsive" : true,
    //"processing": true,
    //"serverSide": true,
    "ajax": { //this is for sending request to server
           "url": "/progettoweb/php/administrator/administrator.php", /*da sostituire con */
           "data": {request: "clients", type : "select"},
           "type": 'POST',
           "dataSrc": ""
         },
     "columns": [
      {  "data": "IDUtente" }, //schema della tabella ( devo aggiungere action dove serve)
      {  "data" : "nome"},
      {  "data" : "cognome"},
      {  "data" : "numeroTelefono"},
      {  "data" : "password"},
      {  "data" : "chiave"},
      {  "data" : "email"},
      {  "data" : "tipoUtente"},
      {  "data" : "dataOraRegistrazione"}
      ]
    });
    /*potrei impostare un reload con un setTimeout*/
});
