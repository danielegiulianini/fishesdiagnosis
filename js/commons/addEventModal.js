/*this file emulates a form submit. I could have simply submitted this form
from html without js file, but in this way only the datatble is reloaded and
not the whole page (with all the tab contents and the other heavy dattables).*/

function isValid(form){
  valid = form.checkValidity();
  form.classList.add("was-validated");
  return valid;
}

$(document).ready(function(){

  $("#confirm-add-event-button").click(function() {
    alert("ciaoo");
    form=$("#add-event-form").get(0);
    if (isValid(form)){
      var data = $(form).serialize();
      var url = `${location.origin}/fishesdiagnosis/php/commons/scripts/reportsManager.php`;//$(form).attr("action");
      $.post(url, data)
        .done(function(){
            $('#events-table').DataTable().ajax.reload();//aggiornare la datatable sottostante
            window.alert("data correctly updated.");//for debugging, to replace with a auto closing box
            $(".modal").modal("hide");  //chiudere i modali (non serve perché faccio redirect)
        })
        .fail(function(xhr, ajaxOptions, thrownError){  //error of transmission
            window.alert("transimission error:"+xhr.status + "," + ajaxOptions +"," + thrownError);//for debugging
        });
    }
  });
});
