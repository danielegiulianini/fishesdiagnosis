function isValid(form){
  valid = form.checkValidity();
  form.classList.add("was-validated");
  return valid;
}

$(document).ready(function(){

  $("#confirm-add-button").click(function() {
    form=$("#add-report-form").get(0);
    if (isValid(form)){
      var data = $(form).serialize();
      var url = `${location.origin}/fishesdiagnosis/php/commons/scripts/addReport.php`;/*$(form).attr("action");*/
      $.post(url, data)
        .done(function(){
            window.alert("data correctly updated.");/*for debugging*/
            $(".modal").modal("hide");  /*chiudere i modali*/
        })
        .fail(function(xhr, ajaxOptions, thrownError){  //error of transmission
            window.alert("transimission error:"+xhr.status + "," + ajaxOptions +"," + thrownError);/*for debugging*/
        });
    }
  });


});
