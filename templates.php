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
        <?php
        if(isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"])
        {
            echo '<div class="edit-box">';
            echo    '<a href="editproduct.php?id=$productId">edit</a>';
            echo '</div>';
        }
        ?>
</template>
<template id="floating-cart-item">
        <div class="floating-cart-row" id="cart-$productId">
            <div class="floating-cart-img">
                    <img src="images/$imageFile" alt="image of $productName">
            </div>
            <a href="/product.php?id=$productId">$productName</a><br>
            <span class="floating-cart-price">$$price</span>(<span class='qty'>1</span>)
            <div class="floating-cart-remove">x</div>
            <div></div>
        </div>
    </template>
    