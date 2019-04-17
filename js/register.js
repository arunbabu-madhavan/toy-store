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
            $('#username').after('<span class="text-danger" id="userinfo">* This field is required</span>');
		    $("#userinfo").fadeOut(10000);
            $('#errorinfo').text('Please enter Username.');
            isvalid = false;
            $('#username').focus();
        }
        if (email == "") {
            $('#email').after('<span class="text-danger" id="emailinfo">* This field is required</span>');
		    $("#emailinfo").fadeOut(10000);
            $('#errorinfo').text('Please enter email.');
            $('#email').focus();
            isvalid = false;
        } else if (!email.match("@")) {
            $('#email').after('<span class="text-danger" id="emailerror">Please enter valid email.</span>');
            $("#emailerror").fadeOut(10000);
            $('#email').focus();
            isvalid = false;
        } if (password == "") {
            $('#password').after('<span class="text-danger" id="passwordinfo">* This field is required</span>');
		    $("#passwordinfo").fadeOut(10000);
            $('#errorinfo').text('Please enter password.');
            $('#password').focus();
            isvalid = false;
        } else if (!password.match(/[A-Za-z]/) || !password.match(/[0-9]/) || !password.length > 5) {
            $('#password').after('<span class="text-danger" id="passworderror1">Please enter valid password. Must contain one or more uppercase letters and lowercase letters, a number and at least 6 letters.</span>');
		    $("#passworderror1").fadeOut(10000);
            $('#password').focus();    
            isvalid = false;
        } else if (password != password_chk) {
            $('#password').after('<span class="text-danger" id="passworderror2">Please confirm your password again.</span>');
		    $("#passworderror2").fadeOut(10000);
            $('#c_password').focus();
            isvalid = false;
        }
         if (streetAddress == "") {
            $('#streetAddress').after('<span class="text-danger" id="streetAddressinfo">* This field is required</span>');
            $("#streetAddressinfo").fadeOut(10000);
            $('#errorinfo').text('Please enter Street Address.');
            $('#streetAddress').focus();
            isvalid = false;
        } 
         if (city == "") {
            $('#city').after('<span class="text-danger" id="cityinfo">* This field is required</span>');
            $("#cityinfo").fadeOut(10000);
            $('#errorinfo').text('Please enter City Name.');
            $('#city').focus();
            isvalid = false;
        } 
         if (zip == "") {
            $('#zip').after('<span class="text-danger" id="zipinfo">* This field is required</span>');
            $("#zipinfo").fadeOut(10000);
             $('#errorinfo').text('Please enter Zip Code.');
             $('#zip').focus();
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
                    } else if (msg == "duplicate_error") {
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