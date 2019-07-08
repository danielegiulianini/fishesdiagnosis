/*
dependencies of this file:
1.  is assumed that encPassword.js file is incuded in html before this file is included as this file
    uses function hex_sha512 there defined.
*/

/*Client side validation is automatically done by javascript it automatically add is-valid is-invalid class*/
$(document).ready(function(){
  (function() {
    window.addEventListener('load', function() {
      var forms = document.getElementsByClassName('needs-validation');  // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var validation = Array.prototype.filter.call(forms, function(form) {  // Loop over them and prevent submission
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false ) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');

          clearTextPassword = form.elements.namedItem("password").value;  /*here I have to encrypt the password before sending it to server*/
          encryptedPassword = hex_sha512(clearTextPassword);
              /*console.log("la password in chiaro e'"+clearTextPassword);
              console.log("la password ecnpryted e'"+encryptedPassword);

              alert("la password in chiaro e'"+clearTextPassword);
              alert("la password criptata e'"+encryptedPassword);*/
          form.elements.namedItem("password").value = encryptedPassword;
              /*console.log("la password che mando al server dal login:"+form.elements.namedItem("password").value);
              alert("la password che mando al server dal login:"+form.elements.namedItem("password").value);*/

        }, false);
      });
    }, false);
  })();
});
