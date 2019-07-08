function isValid(form){ /*this function isn't actually required, browser validation is enough*/
  valid = form.checkValidity();
  form.classList.add("was-validated");
  return valid;
}

/*css properties to apply to custom button the same color of pagination buttons (copied from developer tool)*/
function applyDataTableDefaultButtonStyle(button){
  button.css("color", "#333 !important")
      .css("border", "1px solid #979797")
      .css("background-color", "white")
      .css("background", "-webkit-gradient(linear, left top, left bottom, color-stop(0%, #fff), color-stop(100%, #dcdcdc))")
      .css("background", "-webkit-linear-gradient(top, #fff 0%, #dcdcdc 100%)")
      .css("background", "-moz-linear-gradient(top, #fff 0%, #dcdcdc 100%)")
      .css("background", "-ms-linear-gradient(top, #fff 0%, #dcdcdc 100%)")
      .css("background", "-o-linear-gradient(top, #fff 0%, #dcdcdc 100%)")
      .css("background", "linear-gradient(to bottom, #fff 0%, #dcdcdc 100%)");
}

$(document).ready(function(){
  $('#table').basictable();

  $('input:radio').change(function() {
    let percentageField = $(this).closest("tr").find(".percentage");
     if($(this).val()=="yes"){
        $(percentageField).prop('disabled', false);
     } else{
        $(percentageField).val('');
        $(percentageField).prop('disabled', true);
     }
  });

  $("#confirm-editing-list").click(function(){
    /*ajax call to server to insert into segnopresente or segno assente according to radio value
    siccome è un unica form, basta fare serialize.*/

      form=$("#signs-list-form").get(0);
      if (isValid(form)){
        var data = $(form).serialize();
        var url = `${location.origin}/fishesdiagnosis/php/commons/scripts/reportsManager.php`;
        $.post(url, data)
          .done(function(){
              /*window.location = `${location.origin}/fishesdiagnosis/php/commons/pages/viewReportPage.php`;*/
          })
          .fail(function(xhr, ajaxOptions, thrownError){  //error of transmission
              window.alert("transimission error:"+xhr.status + "," + ajaxOptions +"," + thrownError);//for debugging
          });
      }
  });

  //idScheda is needed by server to fetch datatables
  idScheda = $("#e-idScheda").text();  // take idScheda from span


  //interrogo una volta il server con ajax per reperire gli attributi della tabella (questa cosa la potevo fare anche con php nella pagina)
  table = $('#measurements-table').DataTable({
      "responsive" : true,
      //"processing": true,
      //"serverSide": true,
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
          "infoEmpty": "Nessuna misurazione effettuata per questa scheda.",  /*empty table message*/
      },
      "dom": 'Bfrtip',  /*show button for inserting new record, Bfrtip is nonintuitive string require for button*/
      "buttons": [
              {
                  text: 'Aggiungi nuova misurazione',
                  className: "addMeasurement",  /*datatables buttons can't have an id, so I use a class to apply custom style*/
                  action: function ( e, dt, node, config ) {  /*handler attached to button*/
                      $('#add-measurement-modal').modal('show'); //alert( 'Button activated' );
                  }
              }
          ]
    });

    /*apply same css as pagination button for seamless ux*/
    applyDataTableDefaultButtonStyle($(".addMeasurement"));

    table2 = $('#events-table').DataTable({
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
            "infoEmpty": "Nessuna evento registrato per questa scheda.",  /*empty table message*/
        },
        "dom": 'Bfrtip',  /*show button for inserting new record, Bfrtip is nonintuitive string required for button*/
        "buttons": [
                {
                    text: 'Aggiungi nuovo evento',
                    className: "addEvent",  /*datatables buttons can't have an id, so I use a class to apply custom style*/
                    action: function ( e, dt, node, config ) {  /*handler attached to button*/
                        $('#add-event-modal').modal('show');
                    }
                }
            ]
      });

      applyDataTableDefaultButtonStyle($(".addEvent"));

      table3 = $('#conclusions-table').DataTable({
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
              "infoEmpty": "Nessuna conclusione registrata per questa scheda.",  /*empty table message*/
          },
          "dom": 'Bfrtip',  /*show button for inserting new record, Bfrtip is nonintuitive string required for button*/
          "buttons": [
                  {
                      text: 'Aggiungi nuova conclusione',
                      className: "addConclusion",  /*datatables buttons can't have an id, so I use a class to apply custom style*/
                      action: function ( e, dt, node, config ) {  /*handler attached to button*/
                          $('#add-conclusion-modal').modal('show');
                      }
                  }
              ]
        });

        applyDataTableDefaultButtonStyle($(".addConclusion"));
});
