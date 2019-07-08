/*only apply enc function and send it to server

server (on the same page as the content) checks*/
/*deve contenere una post che nella done ridireziona alla alla user startpage*/


/*this file emulates a form submit. I could have simply submitted this form
from html without js file, but in this way only the datatble is reloaded and
not the whole page (with all the tab contents and the other heavy dattables).*/

function isValid(form){
  valid = form.checkValidity();
  form.classList.add("was-validated");
  return valid;
}

$(document).ready(function(){

  $("#confirm-add-user-button").click(function() {
    form=$("#add-user-form").get(0);
    if (isValid(form)){
      var data = $(form).serialize();
      var url = `${location.origin}/fishesdiagnosis/php/commons/pages/loginPage.php`;//$(form).attr("action");
      $.post(url, data)
        .done(function(errorOutput){
          console.log(errorOutput);
            if (!errorOutput){
              window.alert("data correctly updated.");//for debugging, to replace with a auto closing box
              //window.location = `${location.origin}/fishesdiagnosis/php/user/pages/userStartPage.php`;
            }
        })
        .fail(function(xhr, ajaxOptions, thrownError){  //error of transmission
            window.alert("transimission error:"+xhr.status + "," + ajaxOptions +"," + thrownError);//for debugging
        });
    }
  });
});
