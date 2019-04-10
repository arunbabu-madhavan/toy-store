<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Mitr" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/site.css">
    <script src="js/register.js"></script>
    <style>
        a:hover {
            cursor: hand;
            text-decoration: none;
        }
    </style>
</head>
<body>
  <?php include 'header.php';?>
  

<br><br><br><br><br>

    <!-- Register -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-offset-2 col-sm-8" style="margin-top: 10px;">
                <div class="panel panel-primary">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                        <div id="registerForm" action="registerCheck.php" method="post">
                            <!--action="php/login_chk.php" method="post"-->
                            <div class="form-group">
                                <label for="username">User Name:</label>
                                <input type="text" name="username" class="form-control" id="username">
                            </div>
                            <div class="form-group">
                                <label for="email">Email address:</label>
                                <input type="text" name="email" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password: </label>
                                <input type="password" name="password" class="form-control" id="password">
                            </div>
                            <div class="form-group">
                                <label for="c_password">Confirm Password: </label>
                                <input type="password" name="c_password" class="form-control" id="c_password">
                            </div>
                            <div class="form-group">
                                <label for="streetAddress">Street Address: </label>
                                <input type="text" name="streetAddress" class="form-control" id="streetAddress">
                            </div>
                            <div class="form-group">
                                <label for="city">city: </label>
                                <input type="text" name="city" class="form-control" id="city">
                            </div>
                            <div class="form-group">
                                <label for="zip">zip: </label>
                                <input type="text" name="zip" class="form-control" id="zip">
                            </div>
                            <div class="col-sm-offset-10 col-sm-2">
                                <input type="submit" name="submit" class="btn btn-default" value="REGISTER"
                                    id="register_chk">
                            </div>
                            <span id="errorinfo" class="text-danger" style="font-size: 20pt"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <br><br><br><br><br>
  <?php include 'footer.html';?>
    
</body>
</html>