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
    
    //Execute the query
     $result = mysqli_query($conn,$query);
     $row;
     $addMode = (mysqli_num_rows($result) == 0);

        //Construct the query
        $queryCategory = "SELECT category.Name,category.ID, productcategory.ProductID
        FROM category 
        LEFT JOIN productCategory 
        ON category.ID = productCategory.CategoryID AND ProductCategory.ProductID = $productID";

        //Execute the query
        $categories = mysqli_query($conn,$queryCategory);

    function isCategoryChecked($productId){
        return isset($productId) ? "checked":"";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Toy Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/site.css"/>
    <script src="js/editproduct.js"></script>
</head>
<body>
    <?php include 'header.php'; ?>
    <?php
        if(!isset($_SESSION["isAdmin"]) || $_SESSION["isAdmin"] == false)
        {
            header('location: index.php');  
            exit();
        }

    ?>
    <form action="updateproduct.php" method="POST" onsubmit="return validate();"  enctype="multipart/form-data">
        <input type='hidden' id='product-categories' name='product-categories'  value=""/>
        <input type='hidden' id='isdelete' name='product-delete'  value="0"/>

    <div class="content">
        <div class="productImage">
            <div class="image">
                <?php
                 $deleteText = "Delete";
                 if(!$addMode){
                    $row = mysqli_fetch_array($result);
                    $deleteText = $row['IsDelete'] == '1' ? 'Undo Delete':'Delete';
                    echo '<img id="product-image" src="images/'.trim($row['Picture']).'" />';
                 }
                 else
                    echo '<img id="product-image"/>';

                ?>
            </div>
            <div class="fileUpload">
                <span>Upload Image</span>
                <input type="file" id="product-picture" name="product-picture" accept="image/*" onchange="loadFile(event)" class="upload" id="imagefile" />
            </div>
        </div>
        <div class="productInfo">
            <input type='hidden' id='product-id' name='product-id' value="<?php echo !$addMode ? $row['ID'] : 0 ?>"/>

            <div class="group">      
              <input type="text" id='product-name' name="product-name" value="<?php echo !$addMode ? $row['Name'] : '' ?>">
              <span class="highlight"></span>
              <span class="bar"></span>
              <label>Product Name</label>
            </div>
            <div class="group">      
              <input type="text" id='product-price' name="product-price" value="<?php echo !$addMode ? $row['Price'] : '' ?>">
              <span class="highlight"></span>
              <span class="bar"></span>
              <label>Price</label>
            </div>
            <div class="group">      
              <input type="text" id='product-qty' name="product-qty" value="<?php echo !$addMode ? $row['Quantity'] : '' ?>">
              <span class="highlight"></span>
              <span class="bar"></span>
              <label>Quantity</label>
            </div>
            <div class='form-input-header'>      
              <label>Categories</label>
              <div class="categories-box">
              <?php
               if($categories && mysqli_num_rows($categories) > 0){
                echo '<ul class="wrap">';
                while($crow = mysqli_fetch_array($categories))
                {
                    echo  '<li><input type="checkbox" '.isCategoryChecked($crow["ProductID"]).' data="'.$crow['ID'].'"/>
                     <span class="filter-option" onclick="$(this).prev().click()">'.$crow['Name'].
                     '</span></li>';
                }
                echo '</ul>';
               }
                ?>
              </div>
            </div>
            <div class='form-input-header'>      
              <label>Description</label>
              <textarea name="product-desc" id='product-desc' autocomplete="off" rows="10" cols="50" placeholder="Enter Description...."><?php echo !$addMode ? $row['Description'] : '' ?></textarea>
            </div>
            <div class="button-container">
                <div class="delete-box">
                    <div class="deleteText"><?php echo  $deleteText?></div>
                    <input type="button" value="" onclick="deleteProduct(<?php echo $row['IsDelete']?>)" />
                </div>
                <div class="productCart">
                    <div class="productCartSpan">Save</div>
                    <input id="update-product-btn" type="submit" value="" />
                </div>
            </div>
        </div>
    </div>
    </form>

    <?php include 'footer.html'?>
</body>
</html>

<?php 
  //close connection
  mysqli_close($conn);
?>