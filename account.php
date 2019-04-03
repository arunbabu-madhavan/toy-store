<?php
// include "User.php";
class User{
    var $id;
    var $email;
    var $password;
    var $rank;
}
session_start();
$user = unserialize($_SESSION['user']);

?>

<head>
    <meta charset="UTF-8">
    <title>Account</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Mitr" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/site.css">
    <script src="js/account.js"></script>
    <style>
        a:hover {
            cursor: hand;
            text-decoration: none;
        }
    </style>

</head>
<body>
<?php include 'header.php' ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8" style="margin-top: 10px;">
            <div class="panel panel-primary">

                <div class="panel-heading">Your Account</div>

                <div class="panel-body">
                    <div id="registerForm">
                        <span id="errorinfo"></span>
                        <!--action="php/login_chk.php" method="post"-->
                        <input type="hidden" value="<?=$user->id?>" id="id"/>
                        <input type="hidden" value="<?=$user->rank?>" id="rank"/>
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="text" class="form-control" value="<?=$user->email?>" id="email" disabled>
                        </div>
                        <div class="form-group">
                            <label for="password">Password: </label>
                            <input type="password" name="password" class="form-control" value="<?=$user->password?>" id="password">
                        </div>
                        <div class="form-group">
                            <label for="c_password">Confirm Password: </label>
                            <input type="password" name="c_password" class="form-control" value="<?=$user->password?>" id="c_password">
                        </div>
                        <div class="col-sm-offset-10 col-sm-2">
                            <input type="submit" name="submit" class="btn btn-default" value="Update"
                                   id="register_chk">
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
<?php include 'footer.html' ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>