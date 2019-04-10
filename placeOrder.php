<?php
    session_start();
    include 'dbconfig.php';
   $conn = mysqli_connect("$serverName:$port",$username,$password);

   if(mysqli_connect_errno()){
       die("Database connection failed".mysqli_connect_error());
   }

   mysqli_select_db($conn,$databaseName);

   $cartItems=$_SESSION['cartItems'];
   foreach($cartItems as $item){
     //echo $item->ID;
     $queryString  = "UPDATE product SET quantity = quantity - ".$item->qty." WHERE product.ID = '".$item->ID."'";
     //echo $queryString;
     $result = mysqli_query($conn, $queryString);
      unset($_SESSION['cartItems']);

      header("Location: index.php");


      //insert changes to Sales and Salesorder table.
   }
?>