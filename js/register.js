$(document).ready(function () {
    $("#register_chk").click(function () {
        var isvalid = true;
        var password = $('#password').val();
        var password_chk = $('#c_password').val();
        var email = $('#email').val();
        var username = $('#username').val();
        var streetAddress = $('#streetAddress').val();
        var city = $('#city').val();
        var zip = $('#zip').val();
        if (username == "") {
            $('#errorinfo').text('Please enter Username.');
            isvalid = false;
            $('#username').focus();
        }
        if (email == "") {
            $('#errorinfo').text('Please enter email.');
            $('#email').focus();
            isvalid = false;
        } else if (!email.match("@")) {
            $('#errorinfo').text('Please enter valid email.');
            $('#email').focus();
            isvalid = false;
        } if (password == "") {
            $('#errorinfo').text('Please enter password.');
            $('#password').focus();
            isvalid = false;
        } else if (!password.match(/[A-Za-z]/) || !password.match(/[0-9]/) || !password.length > 5) {
            $('#password').focus();
            $('#errorinfo').text('Please enter valid password. Must contain one or more uppercase letters and lowercase letters, a number and at least 6 letters.');
            isvalid = false;
        } else if (password != password_chk) {
            $('#errorinfo').text('Please confirm your password again.');
            $('#c_password').focus();
            isvalid = false;
        }
         if (streetAddress == "") {
            $('#streetAddress').focus();
            $('#errorinfo').text('Please enter streetAddress.');
            isvalid = false;
        } 
         if (city == "") {
            $('#city').focus();
            $('#errorinfo').text('Please enter cityName.');
            isvalid = false;
        } 
         if (zip == "") {
            $('#zip').focus();
            $('#errorinfo').text('Please enter zipCode.');
            isvalid = false;
        } 
        if (isvalid) {
            $.ajax({
                url: "registerCheck.php",
                data: "username=" + username + "&streetAddress=" + streetAddress + "&city=" + city + "&zip=" + zip+ "&email=" + email + "&password=" + password,
                type: "POST",
                success: function (msg) {
                    if (msg == "success") {
                        alert('Account Created Succesfully. Please Login!');
                        window.location.href = "login.php";
                    } else if (msg == "error") {
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
});