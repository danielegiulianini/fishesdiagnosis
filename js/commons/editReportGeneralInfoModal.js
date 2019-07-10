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
      var url = `${location.origin}/fishesdiagnosis/php/commons/scripts/reportsManager.php`;//$(form).attr("action");
      $.post(url, data)
        .done(function(){
            updateReportGeneralInfoTable();//devo aggiornare la tabella in background DA USARE SOLO QUANDO DATI OK
            window.alert("data correctly updated.");//for debugging, to replace with a auto closing box
            $(".modal").modal("hide");  //chiudere i modali (non serve perché faccio redirect)
        })
        .fail(function(xhr, ajaxOptions, thrownError){  //error of transmission
            window.alert("transimission error:"+xhr.status + "," + ajaxOptions +"," + thrownError);//for debugging
        });
    }
  });

  function updateReportGeneralInfoTable(){
    //retrieve info from modal
    gNome = $("#e-nomeRichiedente").val();
    gMail = $("#e-emailRichiedente").val();
    gTelefono = $("#e-telefonoRichiedente").val();
    gStato = $("#e-stato").val();
    gSiglaProvincia = $("#e-sigla-provincia").val();
    gNomeVeterinario = $("#e-nomeVeterinario").val();
    gNumeroAffetti = $("#e-numeroAffetti").val();
    gNumeroEsaminati = $("#e-numeroEsaminati").val();
    gPercentualeAffetti = $("#e-percentualeAffetti").val();
    gTaglia = $("#e-taglia").val();
    gSpecie = $("#e-specie").val(); /*val sets also select tags*/
    gSesso = $("#e-sesso").val();
    gEta = $("#e-eta").val();
    gVasca = $("#e-vasca").val();
    gOrigine = $("#e-origine").val();
    gSospetto = $("#e-sospetto").val();
    gNote = $("#e-note").text();

    //update table
    $("#g-idScheda").text();  /*nel jquery non posso accedere alla variabile di sessione*/
    $("#g-data").text(gData);
    $("#g-nome-richiedente").text(gNome);
     $("#g-telefono").text(gTelefono);
     $("#g-email").text(gEmail);
     $("#g-stato").text(gStato);
     $("#g-sigla-provincia").text(gSiglaProvincia);
     $("#g-vasca").text(gVasca);
     $("#g-nome-veterinario").text(gNomeVeterinario);
     $("#g-specie").text(gSpecie);
     $("#g-sesso").text(gSesso);
     $("#g-taglia").text(gTaglia);
     $("#origine").text(gOrigine);
     $("#g-eta").text(gEta);
     $("#g-percentuale-affetti").text(gPercentualeAffetti);
     $("#g-numero-affetti").text(gNumeroAffetti);
     $("#g-numero-esaminati").text(gNumeroEsaminati);
     $("#g-sospetto").text(gSospetto);
     $("#g-note").text(gNote);
  }

  function fetchReportGeneralInfoModal(e){
    //potevo fetcharlo con php all'inizio anxiché dalla tabella (ma poi non avrebbe mostrato i cambiamenti effettuati
    //a seguito di modifiche con ajax sul modale stesso)
    //le recupero dalla tabella nell'html e li assegno (anziché chiederli al server)

    //retrieve from table
    idScheda = $("#g-idScheda").text();  /*nel jquery non posso accedere alla variabile di sessione*/
    gData = $("#g-data").text();
    gNome=$("#g-nome-richiedente").text();
    gTelefono =$("#g-telefono").text();
    gEmail= $("#g-email").text();
    gStato=$("#g-stato").text();
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
    $("#e-idScheda").val(idScheda);
    $("#e-nomeRichiedente").val(gNome);
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

  $('#edit-general-info-report-modal').on('shown.bs.modal', function (e) {
    fetchReportGeneralInfoModal(e);
  });
});
