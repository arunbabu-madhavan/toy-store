

<?php
session_start();
include 'dbconfig.php';

$conn = mysqli_connect("$serverName:$port", $username, $password, $databaseName);

if (mysqli_connect_errno())
    {
    die("Database connection failed" . mysqli_connect_error());
    }

$cartItems = $_SESSION['cartItems'];

// insert into Sale, SaleProduct, and Product (update quantity)

$total = 0;

foreach($cartItems as $item)
    {
    $total+= $item->qty * $item->Price;
    }

$queryString = "INSERT INTO Sale VALUES( NULL,'" . $_SESSION['userId'] . "','" . $total . "','1' )";
$insertSales = mysqli_query($conn, $queryString);
$currentSaleId =  mysqli_insert_id($conn);
echo $currentSaleId;

//reduce amount and save sales in database
foreach($cartItems as $item)
    {
    $queryString = "UPDATE product SET quantity = quantity - " . $item->qty . " WHERE product.ID = '" . $item->ID . "'";

    
    $result = mysqli_query($conn, $queryString);
    $queryString = "INSERT INTO SaleProduct VALUES ('" . $currentSaleId . "','" . $item->ID . "','".$item->qty."')";
    echo $queryString;
    $insertSaleProduct = mysqli_query($conn, $queryString);
  }

unset($_SESSION['cartItems']);
mysqli_close($conn);
header("Location: index.php");
?>

