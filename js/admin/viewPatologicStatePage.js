$(document).ready(function() {
  idStatoPat = $("#g-idStatoPat").text();  // take idStatoPat from table
  //specie = $("#g-specie").text();
  alert(idStatoPat);
  //interrogo una volta il server con ajax per reperire gli attributi della tabella (questa cosa la potevo fare anche con php nella pagina)
  table1 = $('#present-signs-table').DataTable({
    "responsive" : true,
    //"processing": true,
    //"serverSide": true,
    "ajax": { //this is for sending request to server
           "url": "/fishesdiagnosis/php/admin/scripts/patologicStateInfoGetter.php",
           "data": {subject : "present_signs", "idStatoPat" : idStatoPat},
           "type": 'POST',
           "dataSrc": ""
         },
     "columns": [
      {  "data": "nome" }, //schema della tabella nel db (devo aggiungere action dove serve)
      {  "data" : "specie"},
      {  "data" : "gradoFrequenza"}
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

    /*
    table3 = $('#measurements-table').DataTable({
      "responsive" : true,
      "ajax": { //this is for sending request to server
              "url": "/fishesdiagnosis/php/commons/scripts/reportsInfoGetter.php",
              "data": {subject : "measurements", "idScheda" : idScheda},
             "type": 'POST',
             "dataSrc": ""
           },
       "columns": [
        {  "data": "caratteristicaAcqua" }, //schema della tabella nel db (devo aggiungere action dove serve)
        {  "data" : "valore"}
      ],
      "language": {
          "infoEmpty": "No records available yet.",  //empty table message
      }
    });

    table4 = $('#events-table').DataTable({
      "responsive" : true,
      "ajax": { //this is for sending request to server
            "url": "/fishesdiagnosis/php/commons/scripts/reportsInfoGetter.php",
            "data": {subject : "events", "idScheda" : idScheda},
             "type": 'POST',
             "dataSrc": ""
           },
       "columns": [
        {  "data": "idEvento" }, //schema della tabella nel db (devo aggiungere action dove serve)
        {  "data" : "dataEvento"},
        {  "data": "dataComparsaSegniClinici" }, //schema della tabella nel db (devo aggiungere action dove serve)
        {  "data" : "tipologia"},
        {  "data": "provenienza" },
        {  "data": "note" }
      ],
      "language": {
          "infoEmpty": "No records available yet.",  //empty table message
      }
    });

    table5 = $('#conclusions-table').DataTable({
      "responsive" : true,
      "ajax": { //this is for sending request to server
        "url": "/fishesdiagnosis/php/commons/scripts/reportsInfoGetter.php",
        "data": {subject : "conclusions", "idScheda" : idScheda},
             "type": 'POST',
             "dataSrc": ""
           },
       "columns": [
        {  "data": "idConclusione" }, //schema della tabella nel db (devo aggiungere action dove serve)
        {  "data" : "risposta"},
        {  "data": "evoluzione" }
      ],
      "language": {
          "infoEmpty": "No records available yet.",  //empty table message
      }
    });*/
});
