<?php
  session_start();
  if (!isset($_SESSION["userName"])) {
    header('location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Toy Store - Orders</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/site.css">
    <link rel="stylesheet" type="text/css" href="css/carousel.css">

    <script src="js/orders.js"></script>
</head>
<body>
<?php include 'header.php'; ?>

<div class="content">
    <div class="pageHeader">Your orders</div>
    <div class="order-history-container">
    </div>
</div>
    <?php include 'footer.html'?>
</body>
</html>