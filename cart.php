<?php

session_start();
// if (!isset($_SESSION["user"])) {
//     echo "<script language='javascript'>";
//     echo "alert(\"Please Login First\");";
//     echo "location='index.php'";
//     echo "</script>";
//     exit();
// }

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = serialize(array());

}
$cart = unserialize($_SESSION['cart']);
$keys = array_keys($cart);


try {
    $db = new PDO('mysql:host=localhost;dbname=toystore', "root", "root");
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    $db = null;
    die();
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Mitr" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/site.css">
    <style>
        a:hover {
            cursor: hand;
            text-decoration: none;
        }

        #show table {
            float: left;
            line-height: 30px;
            font-size: 20px;
        }

        #show img {
            height: 200px;
            width: 210px;
            margin-top: 15px;

        }
    </style>
    <script>
        $(document).ready(function () {
           price1();
        });
        function price(id){
            //alert($("#"+id).val());
            if($("#"+id).val()<=0){
                $.post("pricedefault.php", {"id": id, "num": $("#" + id).val()}, function (data) {

                });
                location.reload();
            }else {
                $.post("price.php", {"id": id, "num": $("#" + id).val()}, function (data) {
                    $("#total").text("Total Price: $" + data);

                });
            }
        }
        function price1(){
            //alert(this.innerText);
            $.post("price.php",{"id":-1,"num":-1},function(data){
                $("#total").text("Total Price: $"+ data);

            });
        }
    </script>
</head>
<body>
<?php include 'header.php' ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-offset-1 col-sm-10" style="margin-top: 10px;">
            <div class="panel panel-primary">
                <div class="panel-heading">My Cart</div>
                <div class="panel-body">
                    <?php
                    if (count($keys) != 0) {

                        ?>
                        <form class="form-horizontal" role="form" action="checkout.php">
                            <?php
                            foreach ($keys as $key) {
                                $rows = $db->query("SELECT * from product where id=$key");
                                if ($rows->rowCount() > 0) {
                                    $num = $cart[$key];
                                    $row = $rows->fetch();
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    $description = $row['description'];
                                    $picture = $row['picture'];
                                    $price = $row['price'];
                                }
                                ?>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Name: <?= $name ?></label>
                                    <label class="control-label col-sm-2">Position: <?= $description ?></label>
                                    <label class="control-label col-sm-3">picture: <?= $picture ?></label>
                                    <label class="control-label col-sm-2">Price: <?= $price ?></label>
                                    <label class="control-label col-sm-1">Number: </label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" value="<?= $num ?>" id="<?=$id?>" onchange="price(<?=$id?>)">
                                    </div>
                                </div>

                                <?php
                            }
//                            $db = null;
                            ?>
                            <div class="form-group">
                                <label class="control-label col-sm-3" id="total"></label>
                            </div>
                            <div class="form-group" style="margin: 0px;">
                                <div class="col-sm-offset-8 col-sm-3">
                                    <button type="submit" class="btn btn-default btn-block">Check Out</button>
                                </div>
                            </div>
                        </form>
                        <?php
                    }else{
                        ?>
                        <div>
                            No item in cart.
                        </div>
                    <?php
                    }
                    ?>
                    <div class="col-sm-offset-8 col-sm-3">
                        <a href="index.php"><button class="btn btn-default btn-block">Keep Shopping</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
<!-- Show previous orders
<?php
  
?>
-->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-offset-1 col-sm-10" style="margin-top: 10px;">
            <div class="panel panel-primary">
                <div class="panel-heading">Previous orders</div>
                <div class="panel-body">
                    <?php
                    $prev_order = $db->query("select * from cart where userid=".$_SESSION["userId"].";"); //userId or id?
                    if ($prev_order->rowCount() > 0) {
                        ?>
                        <table class="table table-striped">
                          <thead>
                            <tr>
                                <th>Order Id</th>
                                <th>Order Date</th>
                                <th>Item Name</th>
                                <th>Description</th>
                                <th>Picture</th>
                                <th>Count</th>
                                <th>Price</th>
                            </tr>
                          </thead>
                          <tbody>
                        <?php
                        foreach ($prev_order as $row) {
                            // $order_id = $row["orderid"];
                            $item_id = $row["productId"];
                            $count = $row["count"];
                            $order_date = $row["order_date"];
                            
                            $price = 0;
                            $item_name = "";
                            $description = "";
                            $picture = "";
                            
                            $mysqli = new mysqli("localhost", "root", "root") or
                                die("Could not connect: " . mysql_error());
                            $res = $mysqli->query("use toystore;"); //

                            $item_details_records = $mysqli->query("select * from product where id=".$item_id." limit 1;");
                            $item_details = mysqli_fetch_row($item_details_records);
                            //echo $item_details[2];
                            $item_name = $item_details[1];
                            $description = $item_details[2];
                            $picture = $item_details[3];
                            $price = floatval($item_details[4]);
                            $cost = $count * $price;
                            ?>
                            
                              <tr>
                                    <!-- It's a shorthand for <?php echo $a; ?> -->
                                    <td><?= $order_id ?></td>
                                    <td><?= $order_date ?></td>
                                    <td><?= $item_name ?></td>
                                    <td><?= $description ?></td>
                                    <!-- <td><?= $picture ?></td> -->
                                    <td><img src="data:image/jpeg;base64,<?php echo base64_encode( $picture ); ?>" /></td>
                                    <td><?= $count ?></td>
                                    <td><?= $cost ?></td>
                              </tr>
                              
                            <?php

                        }
                        ?>
                            </tbody>
                    </table>
                    <?php
                    } else {
                        ?>
                            No previous orders.
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.html' ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>