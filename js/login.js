$(document).ready(function () {
  $("#email").on('blur', function () {
    var pattern = new RegExp(/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/);
    var email = this.value;
    if (pattern.test(email)) {
      $("#emailInfo").html("");
    } else {
      $("#emailInfo").html("Please use a valid email address, such as user@example.com.");
    }
  });

  $("#password").on('blur', function () {
    var pattern = new RegExp(/^$/);
    var passVal = this.value;
    if (passVal === undefined || this.value.length < 6 || pattern.test(passVal)) {
      $("#passInfo").html("You must enter a password longer than 6 characters.");
      $('.login').prop("disabled", true);
    } else {
      $("#passInfo").html("");
      $('.login').prop("disabled", false);
    }
  });
});

