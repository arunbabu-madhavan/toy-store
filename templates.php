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
      <div class="productCart $hide">
        <div class="productCartImg"><img src="images/addcart.png"></div>
        <div class="productCartSpan">Add to Cart</div>
        <input type="button" value=""
                                onclick='addToCart($product)'>
      </div>
      <div class="$hide" style="display:none">
       <h4> Out of Stock</h4>
      </div>
    </div>
  </div>
  <?php
    if(isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"])
    {
        echo '<div class="edit-box">';
        echo    '<a href="editproduct.php?id=$productId">UPDATE</a>';
        echo '</div>';
    }
  ?>
</template>
<template id="floating-cart-item">
        <div class="floating-cart-row" id="cart-$productId">
            <div class="floating-cart-img">
                    <img src="images/$imageFile" alt="image of $productName">
            </div>
            <a href="product.php?id=$productId">$productName</a><br>
            <span class="floating-cart-price">$$price</span>(<span class='qty'>1</span>)
            <div class="floating-cart-remove">x</div>
            <div></div>
        </div>
</template>
<template id="order-item">
    <div class="order-container">
            <order-date>Ordered $orderDate<br>
            <order-number>Order No: $saleId</order-number>
            
            </order-date>
            <order-total>$ $orderTotal</order-total>
            <address-container>
                <shipping-address>
                    <h3>Shipping address:</h3>
                    <p>$Shippingname</p>
                    <p>$ShippingAddress1</p>
                    <p>$ShippingCity</p>
                    <p>$ShippingZip</p>
                </shipping-address>
                <billing-address>
                    <h3>Billing address:</h3>
                    <p>$Billingname</p>
                    <p>$BillingAddress1</p>
                    <p>$BillingCity</p>
                    <p>$BillingZip</p>
                </billing-address>
            </address-container>
            <product-list>
            </product-list>
        </div>
</template>
<template id="order-product-item">
    <product-item>
         <div>
            <img src="images\$orderPicture">
         </div>
         <div>
             <div>
                 <a href="product.php?id=$productID">
                     $productName
                 </a>
             </div>
             <div>
                <span>$$productPrice </span>
                <label>($productQty)</label>
             </div>
         </div>
    </product-item>
</template>
