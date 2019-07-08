/**/

$(document).ready(function() {

  $.ajax({
    url: "http://localhost/chartjs/data.php",
    method: "GET",
    success: function(data) {
      console.log(data);
      var player = [];
      var score = [];

      for(var i in data) {
        player.push("Player " + data[i].playerid);
        score.push(data[i].score);
      }

      var chartdata = {
        labels: player,
        datasets : [
          {
            label: 'Player Score',
            backgroundColor: 'rgba(200, 200, 200, 0.75)',
            borderColor: 'rgba(200, 200, 200, 0.75)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: score
          }
        ]
      };

      var ctx = $("#mycanvas");

      var barGraph = new Chart(ctx, {
        type: 'bar',
        data: chartdata
      });
    },
    error: function(data) {
      console.log(data);
    }
  });
});


    table2 = $('#absent-signs-table').DataTable({
      "responsive" : true,
      "ajax": { //this is for sending request to server
             "url": "/progettoweb/php/administrator/administrator.php", /*DA SOSTITUIRE CON URL CHE INVIA I DATI*/
             "data": {request: "clients", type : "select"},
             "type": 'POST',
             "dataSrc": ""
           },
       "columns": [
        {  "data": "IDUtente" }, //schema della tabella nel db (devo aggiungere action dove serve)
        {  "data" : "nome"}
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
