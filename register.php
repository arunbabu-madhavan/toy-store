<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Mitr" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/site.css">
    <script src="js/index.js"></script>
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

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg" id="myModal">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Login</h4>
                </div>
                <form class="form-horizontal" role="form" action="login.php?type=1" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Email:</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" placeholder="Enter email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">Password:</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="pwd" placeholder="Enter password">
                            </div>
                        </div>
                        <div class="form-group form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="remember"> Remember me
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default">Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Register -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-offset-2 col-sm-8" style="margin-top: 10px;">
                <div class="panel panel-primary">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                        <div id="registerForm">
                            <span id="errorinfo"></span>
                            <!--action="php/login_chk.php" method="post"-->
                            <div class="form-group">
                                <label for="username">User Name:</label>
                                <input type="text" class="form-control" id="username">
                            </div>
                            <div class="form-group">
                                <label for="email">Email address:</label>
                                <input type="text" class="form-control" id="email">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <br><br><br><br><br>
  <?php include 'footer.html';?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>