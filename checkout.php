<?php
session_start();
include 'dbconfig.php';

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
  <?php include 'header.php' ?>
  <div class="content">
    <div class="cart">
      <?php  //var_dump($_SESSION['cartItems']);

        $cartItems=$_SESSION['cartItems'];
        for($i=0;$i<count($cartItems);$i++){
          echo '<div class="cartItem">';
          echo '<img  class="cartImg" src="images/'.$cartItems[$i]->Picture.'" alt="image of Game of Thrones Jon Snow 7.5-Inch Statue Figure"><br>';
          echo 'Name: '.$cartItems[$i]->Name.'<br>';
          echo 'Price: '.$cartItems[$i]->Price.'<br>';
          echo 'Quantity: '.$cartItems[$i]->qty.'<br>';
          echo '</div>';
        }
      ?>
    </div>
  <form action="placeOrder.php" method="POST" id="checkoutForm">
  <div class="main"><div id="accordion">
    <h3 class="accountDetails">Account Details</h3>
    <div><h5>Choose your checkout option</h5><br>Register with us for a faster checkout, to track the status of your order and more. You can also checkout as a guest.<br>
      <form>
    <input type="radio" name="method" value="guest" checked="checked"/>Checkout as Guest<br>
    <?php
        if (!isset($_SESSION["userName"])) {
          echo '<input type="radio" name="method" value="register" />Register an Account<br>';
          echo '<input type="radio" name="method" value="returningCust" />Returning customer<br>';
        }
        ?>
        <button type="button" id="pickCheckout">Continue</button><br>
      </form>
    </div>

    <?php
      if (isset($_SESSION["userName"])) {
        //query db for billing/shipping detail
        $conn = mysqli_connect("$serverName:$port",$username,$password);

        if(mysqli_connect_errno()){
            die("Database connection failed".mysqli_connect_error());
        }

        mysqli_select_db($conn,$databaseName);

        $queryString  = "SELECT * FROM User WHERE email = '".$_SESSION['email']."'";
        $result = mysqli_query($conn, $queryString);
        //echo $queryString;
        $user = mysqli_fetch_assoc($result);
        //var_dump($result);
        }
    ?>
    <h3 class="billingInformation">Billing Details</h3>
      <dl class="billingDetails">
        <dt>
          <label for="email">
            * Email Address:</span>
          </label>
        </dt>
        <dd>
          <input type="email" class="email" value="<?php echo $user['email'] ? $user['email'] : ''; ?>">
        </dd>
        <dt>
          <label for="username">
            * User Name:</span>
          </label>
        </dt>
        <dd>
          <input type="text" class="firstName" value="<?php echo $user['username'] ? $user['username'] : ''; ?>">
        </dd>
        <dt>
          <label for="phoneNumber">
            Phone Number:</span>
          </label>
        </dt>
        <dd>
          <input type="text" class="phone"">
        </dd>
        <dt>
          <label for="phone">
            * Address Line 1:</span>
          </label>
        </dt>
        <dd>
          <input type="text" class="streetAddress" value="<?php echo $user['streetAddress'] ? $user['streetAddress'] : ''; ?>">
        </dd>
        <dt>
          <label for="city">
            * City:</span>
          </label>
        </dt>
        <dd>
          <input type="text" class="city" value="<?php echo $user['city'] ? $user['city'] : ''; ?>">
        </dd>
        <dt>
          <label for="zip">
            * Zip:</span>
          </label><br>
          <input type="text" class="zip"  value="<?php echo $user['zip'] ? $user['zip'] : ''; ?>"/>
        </dt>
        <button type="button" id="pickBilling">Continue</button><br>
      </dl>
    <h3>Shipping Details</h3>
    <div><dl>
    <dt>
          <label for="email">
            * Email Address:</span>
          </label>
        </dt>
        <dd>
          <input type="email" class="email" value="<?php echo $user['email'] ? $user['email'] : ''; ?>">
        </dd>
        <dt>
          <label for="username">
            * User Name:</span>
          </label>
        </dt>
        <dd>
          <input type="text" class="firstName" value="<?php echo $user['username'] ? $user['username'] : ''; ?>">
        </dd>
        <dt>
          <label for="phoneNumber">
            Phone Number:</span>
          </label>
        </dt>
        <dd>
          <input type="text" class="phone"">
        </dd>
        <dt>
          <label for="phone">
            * Address Line 1:</span>
          </label>
        </dt>
        <dd>
          <input type="text" class="streetAddress" value="<?php echo $user['streetAddress'] ? $user['streetAddress'] : ''; ?>">
        </dd>
        <dt>
          <label for="city">
            * City:</span>
          </label>
        </dt>
        <dd>
          <input type="text" class="city" value="<?php echo $user['city'] ? $user['city'] : ''; ?>">
        </dd>
        <dt>
          <label for="zip">
            * Zip:</span>
          </label><br>
          <input type="text" class="zip"  value="<?php echo $user['zip'] ? $user['zip'] : ''; ?>"/>
        </dt>
      </dl>
        <button type="button" id="pickAddress">Continue</button><br></div>
    <h3>Order Confirmation</h3>
      <div>
        Show PHP order details here.<br>
        <button type="submit" id="placeOrder" name="submitQuantity">Continue</button><br>
    </div>
  </div>
  </form>
  </div>
  <?php include 'footer.html' ?>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>

</body>
</html>