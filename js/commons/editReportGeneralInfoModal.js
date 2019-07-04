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
    //potevo fetcharlo con php all'inizio anxiché dalla tabella (ma poi non avrebbe mostrato i cambiamenti effettuati
    //a seguito di modifiche con ajax sul modale stesso)
    //le recupero dalla tabella nell'html e li assegno (anziché chiederli al server)

    //recupero dalla tabella
    idScheda = $("g-idScheda").text();  /*nel jquery non posso accedere alla variabile di sessione*/
    gData = $("g-data").text();
    gNome=$("g-nome-richiedente").text();
    gTelefono =$("g-telefono").text();
    gEmail= $("g-email");
    gStato=$("g-stato");
    gSiglaProvincia = $("g-sigla-provincia");
    gVasca = $("g-vasca");
    gNomeVeterinario = $("g-nome-veterinario");
    gSpecie = $("g-specie").text();
    gSesso = $("g-sesso").text();
    gTaglia = $("g-taglia").text();
    gEta = $("g-eta");
    gPercentualeAffetti = $("g-percentuale-affetti").text();
    gNumeroEsaminati = $("g-numero-esaminati").text();
    gSospetto = $("g-sospetto").text();
    gNote = $("g-note").text();

    //assegno negli input del modale
    $("e-nomeRichiedente").val(gData);
    $("e-telefonoRichiedente").val(gNome);
    $("e-emailRichiedente").val(gNome);
    $("e-nomeVeterinario").val(gNome);
    $("e-numeroAffetti").val(gNome);
    $("e-numeroEsaminati").val(gNome);
    $("e-numeroAffetti").val(gNome);
    $("e-numeroEsaminati").val(gNome);
    $("e-percentualeAffetti").val(gNome);
    $("e-taglia").val(gNome);
    $("-specie").val(gNome);
    $("e-sesso").val(gNome);
    $("e-eta").val(gNome);
    $("e-vasca").val(gNome);
    $("e-origine").val(gNome);
    $("e-sospetto").val(gNome);
    $("e-note").val(gNome);


  };

  $('#general-info-report-modal').on('shown.bs.modal', function (e) {
    fetchReportGeneralInfoModal(e);
  });
});
