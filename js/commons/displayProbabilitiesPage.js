$(document).ready(function() {
/*
canvas ids:
signs_prob-line_chart
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

/*il codice fra i 4 quadranti di una stesso tab (prob) cambiano solo per il selettore e il tipo, potrei rifattorizzare
forse posso fare ogni tab con una sola chiamta ajax!!
il backend php  esattamente lostesso per i diversi quadranti di uno stesso tab, perché ciò che cambia è solo la
rappresentazione, non i dati*/
  idScheda = $("#p-idScheda").text();
  console.log("l'id scheda e'"+idScheda);

  $.ajax({
    url: `${location.origin}/fishesdiagnosis/php/commons/scripts/probabilityComputer.php?request=signs_line&idScheda=${idScheda}`,
    method: "GET",
    success: function(data) {
      console.log(data);
      var nomi = [];
      var probabilitas = [];

      for(var i in data) {
        nomi.push("stato patologico " + data[i].nome);  //same attribute name as in db
        probabilitas.push(data[i].probabilita); //same attribute name as in db
      }

      var chartdata = {
        labels: nomi,
        datasets : [
          {
            label: 'probabilities',
            backgroundColor: 'rgba(200, 200, 200, 0.75)',
            borderColor: 'rgba(200, 200, 200, 0.75)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: probabilitas
          }
        ]
      };

      var ctx = $("#signs_prob-line_chart");

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
