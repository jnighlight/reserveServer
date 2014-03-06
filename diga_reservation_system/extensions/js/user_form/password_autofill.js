function autofill_password()
{
  // Retrieve password
  password = $("#User_password").val();
  // Autofill
  $("#User_password_repeat").val(password);
}

$(document).ready(function(){
  autofill_password();

});

