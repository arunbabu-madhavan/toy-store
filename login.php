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
  <script src="js/login.js"></script>
</head>
<body>
  <?php include 'header.php' ?>
  <div class='content'>
    <main>
    <div class="container">
      <div class="login">
        <h1 class="page-heading">Toy Store Login</h1>
        <style>.loginSmall {font: 14px Gotham Light; margin-top: -10px; margin-bottom: 10px;} .loginSmall a {text-decoration: underline; color: ##0668a5; font-family: Gotham Medium;}</style>
        <div class="loginSmall" style="display: none;">If you are looking for the ToyWiz Buy List, please click <a href="https://tools.toywiz.com/buylist/">here</a>.<br/>&nbsp;</div>

            <div class="login-row">
              <form class="login-form form" action="session.php" method="post">
                  <div class="form-field">
                      <label class="form-label" for="email">Email:</label>
                      <input class="form-input" name="email" id="email" type="text">
                      <div id="emailInfo"></div>
                  </div>
                  <div class="form-field">
                      <label class="form-label" for="password">Password:</label>
                      <input class="form-input" id="password" type="password" name="password">
                      <div id="passInfo"></div>
                  </div>
                  <div class="form-actions">
                      <input type="submit" class="btn btn-primary login" value="Login"><br/>
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
                              <li class="new-customer-fact">Save shipping addresses</li>
                              <li class="new-customer-fact">Access your order history</li>
                              <li class="new-customer-fact">Track new orders</li>
                          </ul>
                          <center><a href="register.php?action=create_account"><button class="button button--primary">Create Account</button></a></center>
                      </div>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </main>
  </div>
  <?php include 'footer.html' ?>
</body>
</html>