function isValid(form){
  valid = form.checkValidity();
  form.classList.add("was-validated");
  return valid;
}

$(document).ready(function(){

  $("#confirm-edit-pat-st-button").click(function() {
    form=$("#edit-pat-st-form").get(0);
    if (isValid(form)){
      var data = $(form).serialize();
      var url = `${location.origin}/fishesdiagnosis/php/scripts/addPatologicState.php`;//$(form).attr("action");
      $.post(url, data)
        .done(function(){
            //updatePatologicStateGeneralInfoTable();//devo aggiornare la tabella in background DA USARE SOLO QUANDO DATI OK
            window.alert("data correctly updated.");//for debugging, to replace with a auto closing box
            $(".modal").modal("hide");  //chiudere i modali (serve perché non faccio redirect)
        })
        .fail(function(xhr, ajaxOptions, thrownError){  //error of transmission
            window.alert("transimission error:"+xhr.status + "," + ajaxOptions +"," + thrownError);//for debugging
        });
    }
  });

  e-idStato
  e-nomeStato
  e-tipoStato


  function updateReportGeneralInfoTable(){
    //retrieve info from modal
    gId = $("#e-idStato").val();
    gNome = $("#e-nomeStato").val();
    gTipo = $("#e-tipoStato").val();

    //update table
    $("#g-idStato").text(gId);  /*nel jquery non posso accedere alla variabile di sessione*/
    $("#g-nomeStato").text(gNome);
    $("#g-tipoStato").text(gTipo);
  }

  /*function called on show.db.modal event*/
  function fetchReportGeneralInfoModal(e){
    //le recupero dalla tabella nell'html e li assegno (anziché chiederli al server)

    //retrieve from table
    idStato = $("#g-idScheda").text();
    nome = $("#g-idScheda").text();  /*nel jquery non posso accedere alla variabile di sessione*/
    tipoStato = $("#g-data").text();

    //assign modal input tags
    $("#e-nomeRichiedente").val(gData);
    $("#e-emailRichiedente").val(gEmail);
    $("#e-emailRichiedente").val(gEmail);
  };

  $('#edit-pat-st-modal').on('shown.bs.modal', function (e) {
    fetchReportGeneralInfoModal(e);
  });

});
