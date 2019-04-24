<?php
    $newArrivals = isset($_GET["newArrivals"]) ? intval($_GET["newArrivals"]) : 0;
    $trending = isset($_GET["trending"]) ? intval($_GET["trending"]) : 0;
    $hotSellers = isset($_GET["hotSellers"]) ? intval($_GET["hotSellers"]) : 0;
    $search = isset($_GET["search"]) ? strtolower(urldecode($_GET["search"])) : "" ;

    //PAGE COUNT
    $page_count = 8;
    session_start();

    include '../dbconfig.php';

    $conn = mysqli_connect("$serverName:$port",$username,$password);

    if(mysqli_connect_errno()){
        die("Databse connection failed".mysqli_connect_error());
    }

    $params = array();
    $queryString  = explode('&', $_SERVER['QUERY_STRING']);

    foreach( $queryString as $param )
    {
      list($name, $value) = explode('=', $param, 2);
      $params[urldecode($name)][] = urldecode($value);
    }

    //Select database
    mysqli_select_db($conn,$databaseName);
    $query = "SELECT DISTINCT product.Name, product.ID, product.Picture, product.Price, product.Quantity FROM product
                where product.IsDelete = 0";

    $queryId = "SELECT product.ID FROM product
                inner join productcategory
                on productcategory.ProductID = product.ID
                where product.IsDelete = 0 ";

    if($search != ""){
        $query = $query.' and product.ID in ('.$queryId." and LOWER(product.Name) like '%$search%' OR LOWER(product.Description) like '%$search%') ";
    }

    if($newArrivals)
     {
        $query = $query." and product.ID in (".$queryId." and productcategory.categoryid = 1) ";
     }

     if($trending)
     {
        $query = $query." and product.ID in (".$queryId." and productcategory.categoryid = 2) ";
     }
     if($hotSellers){
        $query = $query." and product.ID in (".$queryId." and productcategory.categoryid = 3) ";
     }
     if(isset($params['filter']))
        for($i=0;$i<count($params['filter']);$i++)
            {
                $query = $query." and product.ID in (".$queryId." and productcategory.categoryid = ".$params['filter'][$i].") ";
            }

    //Execute the query
    $result = mysqli_query($conn,$query);
    $itemStart = 0;
    if(isset($params['page']))
    {
        $itemStart = ((int)$params['page'][0] -1) * $page_count;
        $itemEnd =  $itemStart + $page_count;
    }
    else
        $itemEnd = mysqli_num_rows($result);

    $TotalPages = ceil(mysqli_num_rows($result) / (float)$page_count);

    $json_array = array();
    $i=0;

    while($row = mysqli_fetch_assoc($result))
    {
        if($i >= $itemStart && $i < $itemEnd)
            $json_array[] = $row;
        $i++;
    }

    $json_array[] =  mysqli_num_rows($result);
    $json_array[] =  $TotalPages;

    echo json_encode($json_array);

?>