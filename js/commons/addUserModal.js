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
      clearTextPassword = form.elements.namedItem("r_password").value;  /*here I have to encrypt the password before sending it to server*/
      encryptedPassword = hex_sha512(clearTextPassword);
          console.log("la password in chiaro e'"+clearTextPassword);
          console.log("la password ecnpryted e'"+encryptedPassword);

          /*alert("la password in chiaro e'"+clearTextPassword);
          alert("la password criptata e'"+encryptedPassword);*/
      form.elements.namedItem("r_password").value = encryptedPassword;


      var data = $(form).serialize();
      var url = `${location.origin}/fishesdiagnosis/php/commons/pages/loginPage.php`;//$(form).attr("action");
      $.post(url, data)
        .done(function(errorOutput){
          if (errorOutput.length<3){  //if server replayed with no errors (response than less 3 means long no errors)
              //window.alert("data correctly updated.");//for debugging
              window.location = `${location.origin}/fishesdiagnosis/php/user/userStartPage.php`;
            }
        })
        .fail(function(xhr, ajaxOptions, thrownError){  //error of transmission
            window.alert("transimission error:"+xhr.status + "," + ajaxOptions +"," + thrownError);//for debugging
        });
    }
  });
});
