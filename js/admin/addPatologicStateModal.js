function isValid(form){
  valid = form.checkValidity();
  form.classList.add("was-validated");
  return valid;
}

$(document).ready(function(){

  $("#confirm-add-pat-st-button").click(function() {
    form=$("#add-pat-st-form").get(0);
    if (isValid(form)){
      var data = $(form).serialize();
      var url = `${location.origin}/fishesdiagnosis/php/admin/scripts/patologicStatesManager.php`;
      $.post(url, data)
        .done(function(data){
            window.location = `${location.origin}/fishesdiagnosis/php/admin/viewPatologicStatePage.php?idStatoPat=${data.idStatoPat}`;
        })
        .fail(function(xhr, ajaxOptions, thrownError){  //error of transmission
            window.alert("transimission error:"+xhr.status + "," + ajaxOptions +"," + thrownError);//for debugging
        });
    }
  });


});
