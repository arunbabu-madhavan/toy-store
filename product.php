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
  </head>
  <body>
    <?php include 'header.php' ?>
    <main>
      <div class="categoryPath">
        <?php
        $rows = array();
        foreach($product as $val){
          $rows[] = $val;
        }
        echo json_encode($rows);
        ?>
        Home > Board Games > Assorted Board Games.
      </div>
      <br>
      <div class="container">
        <div class="row">

          <div class="col-md-1">
            <img src="https://www.yourhtmlsource.com/images/media/banjotooiebig.jpg" style="height:100%;width:100%;box-shadow:1px;border-style:solid;border-width:1px; " alt="product thumbnail"><br>
            <img src="https://www.yourhtmlsource.com/images/media/banjotooiebig.jpg" style="height:100%;width:100%;box-shadow:1px;border-style:solid;border-width:1px; " alt="product thumbnail"><br>
          </div>
          <div class="col-md-4">
            <img src="https://proxy.duckduckgo.com/iu/?u=https%3A%2F%2Ftse3.mm.bing.net%2Fth%3Fid%3DOIP.tLLRgOO1NYUHVrhVpUx27AHaHa%26pid%3D15.1&f=1" style="height:40%;width:40%;box-shadow:1px;border-style:solid;border-width:1px; "
            alt="product picture"><br>
          </div>
          <div class="col-md-4">
            <div class="row">
              <h4>This is the title.<h4>
            </div>
            <div class="row">
              <?php echo $product['Description']; ?>
              <br>
            </div>
            <div class="row">
              <ul>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                <li>In dictum quam eu neque condimentum aliquam.</li>
                <li>Donec fringilla orci et pretium pellentesque.</li>
                <li>Duis a dolor in urna fringilla iaculis.</li>
                <li>Morbi finibus leo vel lectus feugiat maximus.</li>
                <li>Quisque accumsan urna a accumsan congue.</li>
              </ul>
            </div>
          </div>
          <div class="col-md-3">
            <div class="btn btn-primary btn-md btn-block">Add to cart</div><br>
            <div class="btn btn-warning btn-lg btn-block">Checkout</div>
          </div>
        </div>

      </div>

    </main>
  <?php include 'footer.html' ?>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>