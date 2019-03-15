$(document).ready(function () {
    $("#login_email").on('blur', function () {
      //credit: https://emailregex.com/
      var pattern = new RegExp(/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/);
      var emailAddr = this.value;
      console.log(emailAddr);
      if (pattern.test(emailAddr)) {
        $("#emailInfo").html("");
      } else {
        $("#emailInfo").html("Please use a valid email address, such as user@example.com.");
      }
    });
  
    $("#login_pass").on('blur', function (){
      var passVal = this.value;
      if(this.value && this.value.length > 6){
        $("#passInfo").html("");
      } else {
        $("#passInfo").html("You must enter a password longer than 6 characters.");
      }
    });
  });