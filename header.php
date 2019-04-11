
<?php
  $greetingMsg =  empty($_SESSION['userName']) ? "Guest":  $_SESSION['userName'];
?>
<script src="js/header.js"></script>
<header>
   <!-- fonts -->
   <link href="https://fonts.googleapis.com/css?family=Mitr" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
   <div>
      <a href="index.php"><img src="images/logo.png" alt="logo"/></a>
      <div class="search-box">
         <form action="search.php" method="GET" >
            <input type="hidden" name="page" value="1"/>
            <input type="search" autocomplete="off" name="search" placeholder="Search keyword or item..."/>
            <input type="submit" value="Search"/>
         </form>
      </div>
      <div class="user-menu">
         <label class="greeting">Hello <?php  echo $greetingMsg  ?>!</label>
         <?php   if (isset($_SESSION["userName"])) {
         echo "<a href='orders.php'>My Orders</a>";
         }
         ?>
         <?php  echo getLoginLink(); ?>
      </div>
      <div class="cart-box" id="cart-box-icon">
         <span>0</span>
      </div>
   </div>
   <div class="user-menu-md">
      <div>
         <?php  echo getLoginLink(); ?>
      </div>
      <div><a>My Account</a></div>
      <div class="greeting">Hello <?php echo $greetingMsg ?></div>
   </div>
</header>
<div class="header-sub">
   <div>
      <a href="index.php#trending">TRENDING TOYS</a>
   </div>
   <div>
      <a href="index.php#new-arrivals">NEW ARRIVALS</a>
   </div>
   <div>
      <a href="index.php#hot-sellers">HOT SELLERS</a>
   </div>
   <?php
      if(isset($_SESSION["isAdmin"] ) && $_SESSION["isAdmin"] ){
      echo '<div >';
      echo    '<a href="editproduct.php?id=0"><h3>+</h3> ADD NEW PRODUCT</a>';
      echo '</div>';
   }?>
</div>
<div class="floating-cart">
   <span class="floating-cart-header"></span>
   <div class="floating-cart-items">
   </div>
   <div class="floating-cart-buttons">
      <a href="checkout.php#checkout">
         <div class="preview-button floating-cart-button">Checkout</div>
      </a>
      <a href="checkout.php">
         <div class="preview-button preview-button-white floating-cart-button">View Cart</div>
      </a>
   </div>
</div>
<?php include 'templates.php'?>
<?php
   function getLoginLink(){
       if(empty($_SESSION['userName']))
           return '<a class="logout" href="login.php">Login</a>';
        else
           return '<a class="logout" href="logout.php">Logout</a>';
   }
?>

