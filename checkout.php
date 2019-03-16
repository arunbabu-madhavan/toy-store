<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Toy Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script
			  src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
			  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
			  crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Mitr" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/site.css">
    <script src="js/checkout.js"></script>
  </head>
<body>
  <!--<?php include 'header.php' ?>-->
  <main><div id="accordion">
    <h3 class="accountDetails">Account Details</h3>
    <div><h5>Choose your checkout option</h5><br>Register with us for a faster checkout, to track the status of your order and more. You can also checkout as a guest.<br>
    <form><input type="radio" name="method" value="guest" />Checkout as Guest<br>
    <input type="radio" name="method" value="register" />Register an Account<br>
    <input type="radio" name="method" value="returningCust" />Returning customer<br>
    <button type="button" id="pickCheckout">Continue</button><br>
    </form>
    </div>
    <h3 class="billingInformation">Billing Details</h3>
    <div></div>
    <h3>Shipping Details</h3>
    <div></div>
    <h3>Shipping Method</h3>
    <div></div>
    <h3>Order Confirmation</h3>
    <div></div>

  </div>
</main>

  <?php include 'footer.html' ?>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>

</body>
</html>