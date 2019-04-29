<?php
  session_start();

  include 'dbconfig.php';
  $productID = isset($_GET["id"]) ? intval($_GET["id"]) : 0;

  $params = array();
  //Connect to mysql server
  $conn = mysqli_connect("$serverName:$port",$username,$password);

  if(mysqli_connect_errno()){
        die("Databse connection failed".mysqli_connect_error());
  }

  //Select database
  mysqli_select_db($conn,$databaseName);
  //Construct the query
  $query = "SELECT * FROM product WHERE product.ID = $productID AND isDelete = 0";

  $product = mysqli_query($conn,$query);
  if(mysqli_num_rows($product) == 0)
  {
    header('location: index.php');
    exit();
  }
  $row = mysqli_fetch_assoc($product);
  $row1 = $row;
  unset($row1['Description']);
  $productDetail = json_encode($row1);
  $productDetail = str_replace(array("\\r", "\\n"), '', $productDetail);
  $productDetail = str_replace("\"", "'", $productDetail);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Toy Store - <?php echo $row['Name']?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="css/site.css">

  <script src="js/product.js"></script>
</head>
<body>
  <?php include 'header.php' ?>
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-4 product-image-container">
          <?php
            echo "<img id='toyImage' src='images/".trim($row["Picture"])."' alt='product picture' />";
            echo "<br>";
          ?>
        </div>
        <div class="col-md-5">
          <div class="row">
            <?php
            echo "<h3 class='product-heading'>".$row['Name']."</h3>";
            echo "<div class='desc-tab'><span>Description</span></div>";
            echo "<span>".$row['Description']."</span>";
            echo "<br>";
            ?>
          </div>

        </div>
        <div class="col-md-3">
          <div class="productBuybox">
        <div class="buyboxBlock">
					<div class="buyboxPrice">
						<div class="buyboxLabel">Price: </div>
						<div class="buyboxValue">$ <?php echo $row['Price']?></div>
					</div>
				</div>
          <div class="productCart <?php echo $row['Quantity'] <= 0 ? "outOfStock" : ""?>">
            <div class="productCartImg"><img src="images/addcart.png"></div>
            <div class="productCartSpan">Add to Cart</div>
            <input type="button" value=""
            onclick="addToCart(<?php echo $productDetail ?>)" <?php if($row['Quantity'] <= 0) echo 'disabled'; ?>>
          </div>
          <br/>
            <a href="checkout.php">
                <div class="btn btn-warning btn-lg btn-block">Checkout</div>
            </a>
        </div>
        </div>
      </div>
    </div>
  </div>
  <?php include 'footer.html' ?>
</body>
</html>