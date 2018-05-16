$(document).ready(function() {
    var password = document.getElementById("psw");
    var confirm_password = document.getElementById("psw_repeat");

    function validatePassword() {
      if (password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Lösenorden matchar inte!");
      } else {
        confirm_password.setCustomValidity('');
      }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
});
