<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Toy Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Mitr" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/site.css">
    <script src="js/index.js"></script>
    <script src="js/login.js"></script>
  </head>
  <body>
    <?php include 'header.php' ?>

    <main>
    <div class="container">
      <div class="login">
        <h1 class="page-heading">ToyWiz Login</h1>
        <style>.loginSmall {font: 14px Gotham Light; margin-top: -10px; margin-bottom: 10px;} .loginSmall a {text-decoration: underline; color: ##0668a5; font-family: Gotham Medium;}</style>
        <div class="loginSmall" style="display: none;">If you are looking for the ToyWiz Buy List, please click <a href="https://tools.toywiz.com/buylist/">here</a>.<br/>&nbsp;</div>

            <div class="login-row">
              <form class="login-form form" action="/login.php?action=check_login" method="post">
                  <div class="form-field">
                      <label class="form-label" for="login_email">Email Address:</label>
                      <input class="form-input" name="login_email" id="login_email" type="email">
                      <div id="emailInfo"></div>
                  </div>
                  <div class="form-field">
                      <label class="form-label" for="login_pass">Password:</label>
                      <input class="form-input" id="login_pass" type="password" name="login_pass">
                      <div id="passInfo"></div>
                  </div>
                  <div class="form-actions">
                      <input type="submit" class="button button--primary" value="Login"><br/>
                      <a class="forgot-password" href="/login.php?action=reset_password">Forgot your password?</a>
                  </div>
              </form>
              <div class="new-customer">
                  <div class="panel">
                      <div class="panel-header">
                          <h2 class="panel-title">New Customer?</h2>
                      </div>
                      <div class="panel-body">
                          <p class="new-customer-intro">Create an account with us and you&#x27;ll be able to:</p>
                          <ul class="new-customer-fact-list">
                              <li class="new-customer-fact">Check out faster</li>
                              <li class="new-customer-fact">Save multiple shipping addresses</li>
                              <li class="new-customer-fact">Access your order history</li>
                              <li class="new-customer-fact">Track new orders</li>
                              <li class="new-customer-fact">Save items to your wish list</li>
                          </ul>
                          <center><a href="/login.php?action=create_account"><button class="button button--primary">Create Account</button></a></center>
                      </div>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </main>
  <?php include 'footer.html' ?>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>