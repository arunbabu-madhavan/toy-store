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
        Home > Board Games > Assorted Board Games.
      </div>
      <br>
      <div class="container">
        <div class="row">
        
          <div class="col-md-1">
            <img src="https://www.yourhtmlsource.com/images/media/banjotooiebig.jpg" style="height:100%;width:100%;box-shadow:1px;border-style:solid;border-width:1px; " alt="product thumbnail"><br>
            <img src="https://www.yourhtmlsource.com/images/media/banjotooiebig.jpg" style="height:100%;width:100%;box-shadow:1px;border-style:solid;border-width:1px; " alt="product thumbnail"><br>
          </div>
          <div class="col-md-4">
            <img src="https://proxy.duckduckgo.com/iu/?u=https%3A%2F%2Ftse3.mm.bing.net%2Fth%3Fid%3DOIP.tLLRgOO1NYUHVrhVpUx27AHaHa%26pid%3D15.1&f=1" style="height:40%;width:40%;box-shadow:1px;border-style:solid;border-width:1px; " 
            alt="product picture"><br>
          </div>
          <div class="col-md-4">
            <div class="row">
              <h4>This is the title.<h4>
            </div>
            <div class="row">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ut mollis lorem. Quisque vitae turpis non est lobortis placerat. Etiam maximus maximus viverra. Fusce ut purus suscipit, consequat nunc scelerisque, dignissim ipsum. Fusce ac purus efficitur, bibendum dui sit amet, varius mi. Phasellus nec velit convallis, ultrices metus at, venenatis justo. Etiam eu pellentesque massa, vitae lobortis velit. Nulla laoreet finibus massa sit amet dapibus. Vestibulum a neque a massa mattis dictum. Quisque iaculis scelerisque odio eu suscipit. Vivamus et nulla rhoncus, pharetra lacus nec, venenatis felis. Vivamus eu risus et lacus faucibus feugiat at vitae tortor. Nam nec vulputate lectus. Praesent viverra urna sollicitudin, lobortis quam a, iaculis tortor. Etiam ut commodo orci, sit amet cursus orci. Etiam enim sem, faucibus eu cursus eget, rhoncus in neque. 
              <br>
            </div>
            <div class="row">
              <ul>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                <li>In dictum quam eu neque condimentum aliquam.</li>
                <li>Donec fringilla orci et pretium pellentesque.</li>
                <li>Duis a dolor in urna fringilla iaculis.</li>
                <li>Morbi finibus leo vel lectus feugiat maximus.</li>
                <li>Quisque accumsan urna a accumsan congue.</li>
              </ul>
            </div>
          </div>
          <div class="col-md-3">
            <div class="btn btn-primary btn-md btn-block">Add to cart</div><br>
            <div class="btn btn-warning btn-lg btn-block">Checkout</div>
          </div>
        </div>

      </div>

    </main>
  <?php include 'footer.html' ?>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>