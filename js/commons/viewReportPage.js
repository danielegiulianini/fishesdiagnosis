$(document).ready(function() {
  //interrogo una volta il server con ajax per reperire gli attributi della tabella (questa cosa la potevo fare anche con php nella pagina)
  table = $('#presents-signs-table').DataTable({
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
      {  "data" : "nome"}
    ],
    "language": {
        "infoEmpty": "No records available yet.",  /*empty table message*/
    },
    "dom": 'Bfrtip',  /*show button for inserting new record, Bfrtip is nonintuitive string require for button*/
    "buttons": [
            {
                text: 'Modifica',
                className: "modificaElencoSegni",  /*datatables buttons can't have an id, so I use a class to apply custom style*/
                action: function ( e, dt, node, config ) {  /*handler attached to button*/
                    $('#edit-probability-weights-modal').modal('show'); /*alert( 'Button activated' );*/
                }
            }
        ]
    });
});
