/**/

$(document).ready(function() {
/*signs_prob-line_chart
signs_prob-bar_chart
signs_prob-radar_chart
signs_prob-pie_chart

location_prob-line_chart
location_prob-bar_chart
location_prob-radar_chart
location_prob-pie_chart

water_prob-line_chart
water_prob-bar_chart
water_prob-radar_chart
water_prob-pie_chart


overall_prob-line_chart
overall_prob-bar_chart
overall_prob-radar_chart
overall_prob-pie_chart*/

/*il codice fra i 4 quadranti di una stesso tab (prob) cambiano solo per il selettore e il tipo*/
  $.ajax({
    url: `${location.origin}/fishesdiagnosis/php/scripts/data.php?request=signs_line`,
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
