$(document).ready(function () {
    $("#register_chk").click(function () {
        var password = $('#password').val();
        var password_chk = $('#c_password').val();
        var email = $('#email').val();
        if (email == "") {
            $('#errorinfo').text('Please enter email.');
        } else if (password == "") {
            $('#errorinfo').text('Please enter password.');
        } else if (!email.match("@")) {
            $('#errorinfo').text('Please enter valid email.');
        } else if (!password.match(/[A-Za-z]/) || !password.match(/[0-9]/) || !password.length > 5) {
            $('#errorinfo').text('Please enter valid password. Must contain one or more uppercase letters and lowercase letters, and at least 6 letters.');
        } else if (password != password_chk) {
            $('#errorinfo').text('Please confirm your password again.');
        } else {
            $.ajax({
                url: "registerCheck.php",
                data: "password=" + password + "&email=" + email,
                type: "POST",
                success: function (msg) {
                    if (msg == "success") {

                        alert('Account Created Succesfully. Please Login!');
                        window.location.href = "register.php";
                    } else if (msg == "error1") {
                        $('#errorinfo').text('This email has already registered, please try another.');
                    }
                },
                error: function (xhr) {
                    alert('Ajax request');
                },
                complete: function () {

                }
            });
        }
    });
    // bag();
});

// function bag() {
//     $.post("bag.php", {}, function (data) {
//         $("#bag").text(data);
//     });
// }