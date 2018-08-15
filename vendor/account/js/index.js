 // For click here links
$(document).ready(function () {
  // For hiding Signin
  $('#signInClick').click(function () {
    document.querySelector('.overlay').style.display = "none";
  });
  // For hiding Signup
  $('#signUpClick').click(function () {
    document.querySelector('.overlay1').style.display = "none";
  });
});