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
$query = "SELECT *
FROM product
WHERE product.ID = $productID";

$product = mysqli_query($conn,$query);
//var_dump($product);
$row = mysqli_fetch_assoc($product);
$productDetail = json_encode($row);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Toy Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Mitr" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/site.css">
    <script src="js/product.js"></script>
    <script src="js/index.js"></script>
  </head>
  <body>
    <?php include 'header.php' ?>
    <div class="content">
      <div class="categoryPath">
        Home > Board Games > Assorted Board Games.
      </div>
      <br>
      <div class="container">
        <div class="row">

          <div class="col-md-1">

          </div>
          <div class="col-md-4">
            <?php
              echo "<img src='images/".$row["Picture"]."' style='height:40%;width:40%;box-shadow:1px;border-style:solid;border-width:1px;'
              alt='product picture' />";
              echo "<br>";
            ?>
          </div>
          <div class="col-md-4">
            <div class="row">
              <?php
              var_dump($row);
              echo "<h4>".$row['Name']."</h4>";
              echo $row['Description'];
              echo "<br>";
              echo  "Quantity : ".$row['Quantity'];
              echo "<br>";
              echo "Price : ".$row['Price'];

              echo $productDetail;
             ?>
            </div>

          </div>
          <div class="col-md-3">
          <div class="productCart">
		                			<div class="productCartImg"><img src="images/addcart.png"></div>
		                			<div class="productCartSpan">Add to Cart</div>
                                    <input type="button" value=""
                                                            onclick='addToCart(JSON.parse(<?php echo $productDetail ?>))'>
		                      </div><br>
            <div class="btn btn-warning btn-lg btn-block">Checkout</div>
          </div>
        </div>

      </div>

</div>
  <?php include 'footer.html' ?>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>