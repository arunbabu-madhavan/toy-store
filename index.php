<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Toy Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/site.css">
    <link rel="stylesheet" type="text/css" href="css/carousel.css">

    <script src="js/index.js"></script>
</head>
<body>
     <?php include 'header.php'?>
     <div class="content">
        <div class="filter-content">
            <h4>FEATURED BRANDS</h4>
            <template id='brand-filter'>
                <li class='brand-link'><a href="search.php?search=&filter=$filter&page=1">$brand</a></li>
            </template>
        </div>
        <div class="product-content" id="new-arrivals">
            <div class="carousel">
                <div class="csslider infinity" id="slider1">
                    <input type="radio" name="slides" id="slides_1" checked="checked"/>
                    <input type="radio" name="slides" id="slides_2"/>
                    <input type="radio" name="slides" id="slides_3"/>
                    <input type="radio" name="slides" id="slides_4"/>
                    <input type="radio" name="slides" id="slides_5"/>
                    <input type="radio" name="slides" id="slides_6"/>
                    <ul>
                      <li><img alt="DBZ banner" src="images/dbz_banner.jpg"/></li>
                      <li><img alt="captain marvel banner" src="images/capmarv.webp"/></li>
                      <li><img alt="GOT banner" src="images/got_banner.jpg"/></li>
                      <li><img alt="GodZilla banner" src="images/godzilla_banner.jpg"/></li>
                      <li><img alt="LEGO banner" src="images/lego_banner.jpg"/></li>
                      <li><img alt="Star wars banner" src="images/starwars_banner.png"/></li>
                    </ul>
                    <div class="arrows">
                        <label for="slides_1"></label>
                        <label for="slides_2"></label>
                        <label for="slides_3"></label>
                        <label for="slides_4"></label>
                        <label for="slides_5"></label>
                        <label for="slides_6"></label>
                        <label class="goto-first" for="slides_1"></label>
                        <label class="goto-last" for="slides_6"></label>
                    </div>
                    <div class="navigation">
                        <div>
                          <label for="slides_1"></label>
                          <label for="slides_2"></label>
                          <label for="slides_3"></label>
                          <label for="slides_4"></label>
                          <label for="slides_5"></label>
                          <label for="slides_6"></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-box" id="trending">
            <div class="productsHeader"><span>TRENDING</span></div>
            <div class="productrow"></div>
        </div>
        <div class="product-box" id="hot-sellers">
            <div class="productsHeader"><span>HOT SELLERS</span></div>
            <div class="productrow"></div>
        </div>
    </div>
    <?php include 'footer.html'?>
    <template id='new-product-block'>
      <div class="product-block">
        <a href="product.php?id=$productId">
          <div class="productImage">
                  <img src="images/$imgsrc">
          </div>
          <div class="productText">
                $productText
          </div>
          <div class="productPrice">
              $$price
          </div>
        </a>
          <div>
            <div class="productCart">
              <div class="productCartImg"><img src="images/addcart.png"></div>
              <div class="productCartSpan">Add to Cart</div>
                        <input type="button" value=""
                                                onclick='addToCart($product)'>
          </div>
        </div>
      </div>
    </template>
</body>
</html>