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
  <div class="pageHeader">Checkout</div>

  <form action="placeOrder.php" method="POST" id="checkoutForm">
    <div class="main">
      <div id="accordion">
        <h3 class="cartDetails title">Cart</h3>
        <div class="cart" id="cart">
          <div class="cartHeader">
            <div class="cartImage">PRODUCT</div>
            <div class="cartQTY">QTY</div>
            <div class="cartPrice">PRICE</div>
            <div class="cartTotal">TOTAL</div>
          </div>
          <?php
            $cartItems=$_SESSION['cartItems'];
            $subTotal = 0;
            for($i=0;$i<count($cartItems);$i++){
              echo '<div class="cartItem">';
              echo '<div class="product-container">';
              echo '<img class="cartImg" src="images/'.trim($cartItems[$i]->Picture).'">';
              echo '<div><a href="product.php?id='.$cartItems[$i]->ID.'">'.$cartItems[$i]->Name.'</a></div>';
              echo '</div>';
              echo '<div>
                    <span><input type="text" value="'.$cartItems[$i]->qty .'"/></span>
                        <a  onclick='."'".'updateCartItem('.json_encode($cartItems[$i]).',this)'."'".'>update</a>
                        </div>';
              echo '<div> $ '.$cartItems[$i]->Price.'</div>';
              $subTotal += $cartItems[$i]->Price * $cartItems[$i]->qty;
              echo '<div><span class="itemTotal"> $ '.$cartItems[$i]->Price * $cartItems[$i]->qty .'</span>
              <a onclick="removeCartItem('.$cartItems[$i]->ID.',this)">remove</a></div>';
              echo '</div>';
            }
            echo '<div class="subtotal"><h4> $ '.$subTotal.'</h4> <h2>Subtotal</h2> </div>'
          ?>
          <div class="checkoutDetails"><button type="button" class="button button--primary" id="checkoutBtn">Checkout</button></div>
        </div>

        <h3 id="accountDetails">Account Details</h3>
        <div>
        <?php
            if (!isset($_SESSION["userName"])) {
              echo '<div class="accountDetails" ><h5>Choose your checkout option</h5><br>Register with us for a faster checkout, to track the status of your order and more. You can also checkout as a guest.<br>';
              echo '<input type="radio" name="method" value="register" />Register an Account<br>';
              echo '<input type="radio" name="method" value="login" />Returning customer<br>';
              echo '<button type="button" class="button button--primary" id="pickCheckout">Continue</button><br>';
            } else echo "You have already logged in.<br>";
          ?>

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
            $user = mysqli_fetch_assoc($result);
            }
        ?>
        <h3 class="billingInformation">Billing Details</h3>
          <dl class="billingDetails">
            <dt>
              <label for="username">
                *Name:
              </label>
            </dt>
            <dd>
            <div class="group">
              <input type="text"  name="bName" required class="firstName" value="<?php echo $user['username'] ? $user['username'] : ''; ?>">
              <span class="highlight"></span><span class="bar"></span>
          </div>
            </dd>
            <dt>
              <label for="phone">
                * Address:
              </label>
            </dt>
            <dd>
            <div class="group">
              <input class="billingAddress" type="text" name="bAddress" required style="width:500px" class="streetAddress" value="<?php echo $user['streetAddress'] ? $user['streetAddress'] : ''; ?>">
              <span class="highlight"></span><span class="bar"></span>
              </div>

            </dd>
            <dt>
              <label for="city">
                * City:
              </label>
            </dt>
            <dd>
            <div class="group">

              <input type="text" name='bcity'  required class="city" value="<?php echo $user['city'] ? $user['city'] : ''; ?>">
              <span class="highlight"></span><span class="bar"></span>
              </div>

            </dd>
            <dt>
              <label for="zip">
                * Zip:
              </label>
            <div class="group">

              <input type="text" name='bzip' class="zip" required value="<?php echo $user['zip'] ? $user['zip'] : ''; ?>"/>
              <span class="highlight"></span><span class="bar"></span>
              </div>

              <button type="button" class="button button--primary" id="pickBilling">Continue</button><br>
            </dt>
          </dl>
        <h3>Shipping Details</h3>
        <div class="shippingDetails"><dl>
            <dt>
              <label for="username">
                *Name:
              </label>
            </dt>
            <dd>
            <div class="group">
              <input type="text" name="userName" required class="firstName" value="<?php echo $user['username'] ? $user['username'] : ''; ?>">
              <span class="highlight"></span><span class="bar"></span>
          </div>

            </dd>

            <dt>
              <label for="phone">
                * Address:
              </label>
            </dt>
            <dd>
            <div class="group">

              <input class="shippingAddress" type="text" class="streetAddress" name='shippingAddress' required value="<?php echo $user['streetAddress'] ? $user['streetAddress'] : ''; ?>">
              <span class="highlight"></span><span class="bar"></span>
          </div>

            </dd>
            <dt>
              <label for="city">
                * City:
              </label>
            </dt>
            <dd>
            <div class="group">

              <input type="text" class="city" name='city' required value="<?php echo $user['city'] ? $user['city'] : ''; ?>">
              <span class="highlight"></span><span class="bar"></span>
          </div>

            </dd>
            <dt>
              <label for="zip">
                * Zip:
              </label>
              <div class="group">

              <input type="text" class="zip" name='zip' required value="<?php echo $user['zip'] ? $user['zip'] : ''; ?>"/>
              <span class="highlight"></span><span class="bar"></span>
              </div>
            </dt>
          </dl>
          <button type="button" class="button button--primary" id="pickAddress">Continue</button></div>
        <h3>Order Confirmation</h3>
            <div class="orderdetails">
              <button type="submit" id="placeOrder" class="button button--primary" name="submitQuantity">Confirm Order</button><br>
            </div>
          </div>
        </div>
  </form>
  </div>
  </div>
  <?php include 'footer.html' ?>

</body>
</html>