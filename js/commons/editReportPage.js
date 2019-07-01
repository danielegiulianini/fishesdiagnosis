$(document).ready(function(){
  $('#table').basictable();

  $('input:radio').change(function() {
    let percentageField = $(this).closest("tr").find(".percentage");
     if($(this).val()=="yes"){
       $(percentageField).prop('disabled', false);
     } else{
        $(percentageField).prop('disabled', true);
     }
  });
});
