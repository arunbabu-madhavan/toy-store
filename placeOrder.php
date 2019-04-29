

<?php
session_start();
include 'dbconfig.php';

$conn = mysqli_connect("$serverName:$port", $username, $password, $databaseName);

if (mysqli_connect_errno())
    die("Database connection failed" . mysqli_connect_error());

$cartItems = $_SESSION['cartItems'];

$total = 0.0;

if(!isset($_SESSION["userId"]))
    {
        header("Location: login.php");
        exit();
    }

    $bName = $_POST["bName"];
    $bAddress = $_POST["bAddress"];
    $bcity = $_POST["bcity"];
    $bzip = $_POST["bzip"];

    $shName = $_POST["userName"];
    $shAddress = $_POST["shippingAddress"];
    $shcity = $_POST["city"];
    $shzip = $_POST["zip"];

    $updateBillingAddressSql  = 'UPDATE user
     SET username="'.$bName.'"
    ,streetAddress="'.$bAddress.'"
    ,city="'.$bcity.'"
    ,zip="'.$bzip.'"
    WHERE userId='.$_SESSION["userId"];

  mysqli_query($conn, $updateBillingAddressSql);

foreach($cartItems as $item)
    $total+= $item->qty * $item->Price;

$queryString = "INSERT INTO Sale VALUES( NULL,'" . $_SESSION['userId'] . "','"
 . $total . "','1',".'CURRENT_DATE()'.")";


$insertSales = mysqli_query($conn, $queryString);
$currentSaleId =  mysqli_insert_id($conn);

//reduce amount and save sales in database
foreach($cartItems as $item)
{
    $queryString = "UPDATE product SET quantity = quantity - " . $item->qty . " WHERE product.ID = '" . $item->ID . "'";
    $result = mysqli_query($conn, $queryString);
    $queryString = "INSERT INTO SaleProduct VALUES ('" . $currentSaleId . "','" . $item->ID . "','".$item->qty."')";
    $insertSaleProduct = mysqli_query($conn, $queryString);
}

$updateshippingAddressSql    = 'INSERT INTO shippingAddress
                        (saleId, name, streetAddress, city, zip)
                         values( "'.$currentSaleId.'","
                    '.$shName.'","
                    '.$shAddress.'","
                    '.$shcity.'",
                    '.$shzip.')';
                    echo $updateshippingAddressSql ;

mysqli_query($conn, $updateshippingAddressSql);

unset($_SESSION['cartItems']);
mysqli_close($conn);
header("Location: orders.php");
?>

