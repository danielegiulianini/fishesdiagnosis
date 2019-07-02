function isValid(form){
  valid = form.checkValidity();
  form.classList.add("was-validated");
  return valid;
}

$(document).ready(function(){

  $("#confirm-edit-general-info-report-button").click(function() {
    form=$("#edit-general-info-report-form").get(0);
    if (isValid(form)){
      var data = $(form).serialize();
      var url = `${location.origin}/fishesdiagnosis/php/commons/scripts/addReport.php`;//$(form).attr("action");
      $.post(url, data)
        .done(function(){
            //window.alert("data correctly updated.");//for debugging, to replace with a auto closing box
            //$(".modal").modal("hide");  //chiudere i modali (non serve perché faccio redirect)
            window.location = `${location.origin}/fishesdiagnosis/php/commons/scripts/editReportPage.php`;
            /*devo aggiornare la tabella in background*/
        })
        .fail(function(xhr, ajaxOptions, thrownError){  //error of transmission
            window.alert("transimission error:"+xhr.status + "," + ajaxOptions +"," + thrownError);//for debugging
        });
    }
  });

  function fetchReportGeneralInfoModal(e){
    //potevo fetcharlo con php all'inizio (ma poi non avrebbe mostrato i cambiamenti effettuati a seguito di modifiche)
    //le recupero dalla tabella e li assegno (anziché chiederli al server)
  };

  $('#general-info-report-modal').on('shown.bs.modal', function (e) {
    fetchReportGeneralInfoModal(e);
  });
});
