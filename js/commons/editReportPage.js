$(document).ready(function(){
  $('#table').basictable();

  $('input:radio').change(function() {
    let percentageField = $(this).closest("tr").find(".percentage");
     if($(this).val()=="yes"){
       $(percentageField).prop('disabled', false);
     } else{
        $(percentageField).val('');
        $(percentageField).prop('disabled', true);
     }
  });

  $("#confirm-editing-list").click(function(){
    /*ajax call to server to insert into segnopresente or segno assente according to radio value
    siccome è un unica form, basta fare serialize.*/
  });
});
