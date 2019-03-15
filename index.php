<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Toy Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
         <!-- fonts -->
         <link href="https://fonts.googleapis.com/css?family=Mitr" rel="stylesheet">
         <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/site.css">
    <script src="js/index.js"></script>
</head>
<body>
        <?php include 'header.php'?>
        <div class="content">
           <div class="filter-content">
                <h4>FEATURED BRANDS</h4>
                <template id='brand-filter'>   
                    <li><a href="/search.php/?brand=$brand">$brand</a></li>
                </template>
           </div>
           <div class="product-content"></div>
        </div>
        <?php include 'footer.html'?>
</body>
</html>