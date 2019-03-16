$(document).ready(function () {
  $(function () {
    $("#accordion").accordion();
  });

  $("#pickCheckout").click(function (e) {
    var answer = $('input[name=method]:checked').val();
    if (answer === "guest") {
      $('#accordion').accordion('option','active',1);
    } else if (answer === "register") {
      window.location.href = "register.php";
    } else {
      window.location.href = "login.php";
    }
  });

});