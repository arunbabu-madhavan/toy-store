<?php
session_start();
include '../dbconfig.php';


if(!isset($_SESSION["userId"]))
    {
        header("Location: login.php");
        exit();
    }

$userId = $_SESSION['userId'];

$conn = mysqli_connect("$serverName:$port",$username,$password);

if(mysqli_connect_errno()){
    die("Databse connection failed".mysqli_connect_error());
}

mysqli_select_db($conn,$databaseName);
    $query = "SELECT sale.`saleId` as 'orderID', user.`userId`,sale.Date, `total`,product.ID,product.Name,product.Price,product.Picture,saleproduct.quantity as 'qty'
    
    , user.username as 'bName'
    , user.streetAddress as 'bAddress'
    , user.city as 'bCity'
    , user.zip as 'bZip'
     FROM `sale` 
    INNER JOIN saleproduct 
    ON sale.saleId = saleproduct.saleId
    inner join product on product.ID = saleproduct.productId 
    inner join user on user.userid = sale.userId
    where completed = 1 and sale.userId =".$userId;

    //Execute the query
    $result = mysqli_query($conn,$query);

    $json_array = array();

    while($row = mysqli_fetch_assoc($result))
        $json_array[] = $row;
    
    echo json_encode($json_array);

?>