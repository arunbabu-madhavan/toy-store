<?php
    session_start();
    include 'dbconfig.php';

    if(!isset($_SESSION["isAdmin"]) || $_SESSION["isAdmin"] == false)
    {
        header('location: index.php');
        exit();
    }

    $picture ="";

    if(isset($_FILES['product-picture']) && isset( $_FILES['product-picture']['name']) &&  $_FILES['product-picture']['name'] != "")
    {   
        $picture = $_FILES['product-picture']['name'];
        $picture = file_newname('images',$picture );
        $picture = trim($picture);
        echo $picture;
        move_uploaded_file($_FILES['product-picture']['tmp_name']
                            , "images/$picture");
    }

    $name = $_POST["product-name"];
    $desc = $_POST["product-desc"];
    $price= $_POST["product-price"];
    $qty  = $_POST["product-qty"];
    $delete = $_POST["product-delete"];

    $categories = $_POST["product-categories"];

    $name = test_input($name); 
    $desc = test_input($desc);
    $price = test_input($price);
    $qty = test_input($qty);
    $delete = test_input($delete);
    
    $conn = mysqli_connect("$serverName:$port",$username,$password);

    if(mysqli_connect_errno()){
         die("Database connection failed".mysqli_connect_error());
    }

     //Select database
     mysqli_select_db($conn,$databaseName);

    $addMode = $_POST['product-id'] == 0;

    $query = "";
    $categoryQuery = "";
    $categoryDeleteQuery = "";
    $productID = $_POST['product-id'];


    if($addMode)
    {
        $query = 'INSERT INTO product (Name,Description,Picture, Price, Quantity, IsDelete) 
                    VALUES( "'.$name.'","
                    '.$desc.'","
                    '.$picture.'",
                    '.$price.',
                    '.$qty.',
                    '.$delete.')';
                    echo $query;
        
        mysqli_query($conn, $query);
        $productID = mysqli_insert_id($conn);
    }
    else
    {
        $query = 'UPDATE product SET Name="'.$name.'"
                                ,Description="'.$desc.'"
                                ,Picture='.($picture == "" ? 'Picture' : '"'.$picture.'"' ).'
                                ,Price='.$price.'
                                ,Quantity='.$qty.'
                                ,IsDelete='.$delete.' 
                                WHERE ID='.$productID;
        mysqli_query($conn, $query);

    }
    $categoryDeleteQuery = "DELETE FROM productcategory where categoryid in ($categories) and productid = $productID";

    mysqli_query($conn, $categoryDeleteQuery);

    $splitCategories = explode(',',$categories);

    for($i=0;$i<count($splitCategories);$i++){
        $categoryQuery = "INSERT INTO productcategory (productid,categoryid) 
                                    values($productID,$splitCategories[$i])";
        
      mysqli_query($conn, $categoryQuery);
    }

    //close connection
   
    mysqli_close($conn);
    header('location:product.php?id='.$productID);
    exit();

    function test_input($data) {
        $data = trim($data);
      //  $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function file_newname($path, $filename){
        $ext =".jpg";
        if ($pos = strrpos($filename, '.')) {
               $fname = substr($filename, 0, $pos);
               $ext = substr($filename, $pos);
        } else {
               $fname = $filename;
        }
    
        $newpath = $path.'/'.$filename;
        $newname = $filename;
        $counter = 0;
        while (file_exists($newpath)) {
               $newname = $fname .'_'. $counter . $ext;
               $newpath = $path.'/'.$newname;
               $counter++;
         }
    
        return trim($newname);
    }
?>