$(document).ready(function() {
  idScheda = $("#g-idScheda").text();  // take idScheda from table

  //interrogo una volta il server con ajax per reperire gli attributi della tabella (questa cosa la potevo fare anche con php nella pagina)
  table1 = $('#present-signs-table').DataTable({
    "responsive" : true,
    //"processing": true,
    //"serverSide": true,
    "ajax": { //this is for sending request to server
           "url": "/fishesdiagnosis/php/commons/scripts/reportsInfoGetter.php",
           "data": {subject : "present_signs", "idScheda" : idScheda},
           "type": 'POST',
           "dataSrc": ""
         },
     "columns": [
      {  "data": "nome" }, //schema della tabella nel db (devo aggiungere action dove serve)
      {  "data" : "percentuale"}
    ],
    "language": {
        "infoEmpty": "No records available yet.",  /*empty table message*/
    }

    /*TO ADD only if wanting to incorporating viewReportPage and editReportPage:
     ,
    "dom": 'Bfrtip',  //show button for inserting new record, Bfrtip is nonintuitive string require for button
    "buttons": [
            {
                text: 'Modifica',
                className: "modificaElencoSegni",  //datatables buttons can't have an id, so I use a class to apply custom style
                action: function ( e, dt, node, config ) {  //handler attached to button
                    $('#edit-probability-weights-modal').modal('show'); //alert( 'Button activated' );
                }
            }
        ]*/


    });

    table2 = $('#absent-signs-table').DataTable({
      "responsive" : true,
      "ajax": { //this is for sending request to server
            "url": "/fishesdiagnosis/php/commons/scripts/reportsInfoGetter.php",
            "data": {subject : "absent_signs", "idScheda" : idScheda},
             "type": 'POST',
             "dataSrc": ""
           },
       "columns": [
        {  "data": "nome" }
      ],
      "language": {
          "infoEmpty": "No records available yet.",  /*empty table message*/
      }
    });

    table = $('#measurements-table').DataTable({
      "responsive" : true,
      "ajax": { //this is for sending request to server
             "url": "/progettoweb/php/administrator/administrator.php", //DA SOSTITUIRE CON URL CHE INVIA I DATI
             "data": {request: "clients", type : "select"},
             "type": 'POST',
             "dataSrc": ""
           },
       "columns": [
        {  "data": "IDUtente" }, //schema della tabella nel db (devo aggiungere action dove serve)
        {  "data" : "nome"}
      ],
      "language": {
          "infoEmpty": "No records available yet.",  //empty table message
      }
    });

    table = $('#events-table').DataTable({
      "responsive" : true,
      "ajax": { //this is for sending request to server
             "url": "/progettoweb/php/administrator/administrator.php", //DA SOSTITUIRE CON URL CHE INVIA I DATI
             "data": {request: "clients", type : "select"},
             "type": 'POST',
             "dataSrc": ""
           },
       "columns": [
        {  "data": "IDUtente" }, //schema della tabella nel db (devo aggiungere action dove serve)
        {  "data" : "nome"},
        {  "data": "IDUtente" }, //schema della tabella nel db (devo aggiungere action dove serve)
        {  "data" : "nome"},
        {  "data": "IDUtente" }
      ],
      "language": {
          "infoEmpty": "No records available yet.",  //empty table message
      }
    });
});
