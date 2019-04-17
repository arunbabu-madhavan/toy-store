<?php
session_start();
      
      include 'dbconfig.php';
    
        $params = array();

        //Connect to mysql server
        $conn = mysqli_connect("$serverName:$port",$username,$password);

        if(mysqli_connect_errno()){
            die("Databse connection failed".mysqli_connect_error());
        }

        //Select database
        mysqli_select_db($conn,$databaseName);
                
        //Construct the query
        $query = "SELECT HeadCategory.Name AS HeadCategory,Category.Name,Category.ID 
                  FROM Category 
                  INNER JOIN HeadCategory 
                  ON Category.HeadCategoryID = HeadCategory.ID 
                  ORDER BY HeadCategory.ID,Category.Name";

        //Execute the query
        $categories = mysqli_query($conn,$query);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Toy Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/site.css">
    <script src="js/search.js"></script>
</head>
<body>
     <?php include 'header.php'?>
     <div class="content">
        <div class='leftSidebar'>
            <div class="heading">FILTER BY:</div>
            <div class="filters">
                <?php 
                    $headCategory  = '';
                    if($categories && mysqli_num_rows($categories) > 0){
                        while($row = mysqli_fetch_array($categories))
                        {
                            if($headCategory != $row['HeadCategory'] && $headCategory != '') {
                                         echo '</ul>';
                                     echo '</div>';
                                 echo '</div>';
                            }
                            if($headCategory != $row['HeadCategory']){
                                echo '<div class="filter">';
                                    echo '<div class="filterHeader">';
                                        echo '<span>'.$row['HeadCategory'].'</span>';
                                        echo '<div class="filterHeaderTriangle">▶</div>';
                                    echo '</div>';
                                    echo '<div class="filterBlock">';
                                        echo '<ul>';
                            }
                                            echo  '<li><input type="checkbox" '.isSelected($row["ID"],$row['Name']).'  
                                                        onclick="filterResults('."'"."filter"."'".',$(this).prop('."'"."checked"."'".'),'.$row['ID'].');loadSearchResults();"/>
                                                         <span class="filter-option" onclick="$(this).prev().click()">'.$row['Name'].
                                                         '</span></li>';
                            $headCategory = $row['HeadCategory'];
                        }
                                        echo '</ul>';
                                    echo '</div>';
                                 echo '</div>';
                    }
                  
                ?>
            </div>
        </div>  
        <div class='loading'>
                    <img src="images\ajax-loader.gif"/>
            </div>
        <div class="search-result">
            
            <div id="searchHeader">
                <span>
                </span>
                <span class="term">
                </span>
            </div>
            <div class="productsPagination">
                <ul>
                </ul>
            </div>
            <div class='products-grid'>
                <div class='productrow'>
                </div>
            </div>
            <div class="productsPagination">
                <ul>
                </ul>
            </div>
        </div> 
     </div>
     <?php include 'footer.html'?>
  
</body>
</html>

<?php 
  //close connection
  mysqli_close($conn);

  function isSelected($controlValue,$brandName){

    $check = isset($_GET['brand']) && $_GET['brand'] == $brandName;
    $params = array();
    $queryString  = explode('&', $_SERVER['QUERY_STRING']);

    foreach( $queryString as $param )
    {
      list($name, $value) = explode('=', $param, 2);
      $params[urldecode($name)][] = urldecode($value);
    }
    
    if(isset($params['filter']))
        for($i=0;$i<count($params['filter']);$i++)
            if($params['filter'][$i] == $controlValue) 
                return "checked";

    if($check)
        return "checked";

    return  '';
}
?>
