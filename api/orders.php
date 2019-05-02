<?php
session_start();
include '../dbconfig.php';


if(!isset($_SESSION["userId"]))
{
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['userId'];

//debug
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$conn = mysqli_connect("$serverName:$port",$username,$password);

if(mysqli_connect_errno()){
    die("Databse connection failed".mysqli_connect_error());
}

mysqli_select_db($conn,$databaseName);
    $query = "SELECT Sale.`saleId` as 'orderID', User.`userId`,Sale.Date
    , `total`,product.ID,product.Name,product.Price,product.Picture
    ,SaleProduct.quantity as 'qty'
    , User.username as 'bName'
    , User.streetAddress as 'bAddress'
    , User.city as 'bCity'
    , User.zip as 'bZip'
    , shippingAddress.name as 'shName'
    , shippingAddress.streetAddress as 'shAddress'
    , shippingAddress.city as 'shCity'
    , shippingAddress.zip as 'shZip'
     FROM `Sale`
    INNER JOIN SaleProduct
    ON Sale.saleId = SaleProduct.saleId
    inner join product on product.ID = SaleProduct.productId
    inner join User on User.userId = Sale.userId
    inner join shippingAddress on shippingAddress.saleId = Sale.saleId
    where completed = 1 and Sale.userId =".$userId." order by Sale.date desc,Sale.saleId desc";

    //Execute the query
    $result = mysqli_query($conn,$query);

    $json_array = array();

    while($row = mysqli_fetch_assoc($result))
        $json_array[] = $row;

    echo json_encode($json_array);

?>