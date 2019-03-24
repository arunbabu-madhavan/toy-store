<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Toy Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Mitr" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/site.css">
    <script src="js/product.js"></script>
  </head>
  <body>
    <?php include 'header.php' ?>
    <main>
      <div class="categoryPath">
        Home > Board Games > Assorted Board Games
      </div>
      <br>
      <div class="container">
        <div class="row">
        
          <div class="col-xs-1">
            <img src="" style="height:10%;width:10%;box-shadow:1px;border-style:solid;border-width:1px; " alt="product thumbnail"><br>
            <img src="" style="height:10%;width:10%;box-shadow:1px;border-style:solid;border-width:1px; " alt="product thumbnail"><br>
            <img src="" style="height:10%;width:10%;box-shadow:1px;border-style:solid;border-width:1px; " alt="product thumbnail"><br>
            <img src="" style="height:10%;width:10%;box-shadow:1px;border-style:solid;border-width:1px; " alt="product thumbnail"><br>
          </div>
          <div class="col-xs-1">
            <img src="" style="height:40%;width:40%;box-shadow:1px;border-style:solid;border-width:1px; " alt="product thumbnail"><br>
          </div>
          <div class="col">
            Details
          </div>
          <div class="col">
            Price and carts
          </div>
        </div>

      </div>
    </main>
  <?php include 'footer.html' ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>