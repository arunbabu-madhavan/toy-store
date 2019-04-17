<?php
session_start();
if(!empty($_SESSION['userName'])){
  header('location:index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Toy Store - Login</title>
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
            <div class="login-row">
              <form class="login-form form" action="loginSession.php" method="post">
                  <div class="form-field">
                      <label class="form-label" for="email">Email  Address:</label>
                      <input class="form-input" name="email" id="email" type="text">
                      <div id="emailInfo"></div>
                  </div>
                  <div class="form-field">
                      <label class="form-label" for="password">Password:</label>
                      <input class="form-input" id="password" type="password" name="password">
                      <div id="passInfo"></div>
                  </div>
                  <div class="form-actions">
                  <div class="login-button-container">
                      <?php if(isset($_SESSION['wrongLoginInfo']) && $_SESSION['wrongLoginInfo']) echo '<div id="emailInfo">Wrong username or password.</div>'; ?>
                      <input type="submit" class="btn btn-primary login" value="Login">
                  </div>
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
                          <div class="login-button-container"><a href="register.php?action=create_account"><button class="button button--primary">Create Account</button></a></div>
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