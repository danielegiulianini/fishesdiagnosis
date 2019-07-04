function isValid(form){
  valid = form.checkValidity();
  form.classList.add("was-validated");
  return valid;
}

$(document).ready(function(){

  $("#confirm-add-button").click(function() {
    form=$("#add-general-info-report-form").get(0);
    if (isValid(form)){
      var data = $(form).serialize();
      var url = `${location.origin}/fishesdiagnosis/php/commons/scripts/addReport.php`;//$(form).attr("action");
      $.post(url, data)
        .done(function(){
            window.location = `${location.origin}/fishesdiagnosis/php/commons/scripts/editReportPage.php`;
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
    idScheda = $("#g-idScheda").text();  /*nel jquery non posso accedere alla variabile di sessione*/

    alert("id scheda : "+idScheda);
    gData = $("#g-data").text();
    gNome=$("#g-nome-richiedente").text();
    gTelefono =$("#g-telefono").text();
    gEmail= $("#g-email").text();
    gStato=$("#g-stato");
    gSiglaProvincia = $("#g-sigla-provincia").text();
    gVasca = $("#g-vasca").text();
    gNomeVeterinario = $("#g-nome-veterinario").text();
    gSpecie = $("#g-specie").text();
    gSesso = $("#g-sesso").text();
    gTaglia = $("#g-taglia").text();
    gOrigine= $("#origine").text();
    gEta = $("#g-eta").text();
    gPercentualeAffetti = $("#g-percentuale-affetti").text();
    gNumeroAffetti = $("#g-numero-affetti").text();
    gNumeroEsaminati = $("#g-numero-esaminati").text();
    gSospetto = $("#g-sospetto").text();
    gNote = $("#g-note").text();

    //assign modal input tags
    $("#e-nomeRichiedente").val(gData);
    $("#e-emailRichiedente").val(gEmail);
    $("#e-telefonoRichiedente").val(gTelefono);
    $("#e-stato").val(gStato);
    $("#e-sigla-provincia").val(gSiglaProvincia);
    $("#e-nomeVeterinario").val(gNomeVeterinario);
    $("#e-numeroAffetti").val(gNumeroAffetti);
    $("#e-numeroEsaminati").val(gNumeroEsaminati);
    $("#e-percentualeAffetti").val(gPercentualeAffetti);
    $("#e-taglia").val(gTaglia);
    $("#e-specie").val(gSpecie); /*val sets also select tags*/
    $("#e-sesso").val(gSesso);
    $("#e-eta").val(gEta);
    $("#e-vasca").val(gVasca);
    $("#e-origine").val(gOrigine);
    $("#e-sospetto").val(gSospetto);
    $("#e-note").text(gNote);  /*textarea is the only that needs text*/
  };

  $('#add-general-info-report-modal').on('shown.bs.modal', function (e) {
    fetchReportGeneralInfoModal(e);
  });
});
