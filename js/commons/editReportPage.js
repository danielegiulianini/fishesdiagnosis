$(document).ready(function() {
  //interrogo una volta il server con ajax per reperire gli attributi della tabella (questa cosa la potevo fare anche con php nella pagina)
  table = $('presents-signs-table').DataTable({
    "responsive" : true,
    //"processing": true,
    //"serverSide": true,
    "ajax": { //this is for sending request to server
           "url": "/progettoweb/php/administrator/administrator.php", /*DA SOSTITUIRE CON IL FILE CHE INVIA I DATI*/
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
    ],
    "language": {
        "infoEmpty": "No records available - Got it?",  /*empty table message*/
    },
    "buttons": [  /*show button for inserting new record*/
            {
                text: 'My button',
                action: function ( e, dt, node, config ) {
                    alert( 'Button activated' );
                }
            }
        ]
    });
    /*potrei impostare un reload con un setTimeout*/
});
