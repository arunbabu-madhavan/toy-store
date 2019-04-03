
$(()=>{
    $('#cart-box-icon').click(()=>{
        if(count !=0)
            $('.floating-cart').toggle();
    });
    getCartFromSession();
});

String.prototype.replaceAll = function(search, replacement) {
    var target = this;
    return target.replace(new RegExp(search, 'g'), replacement);
};

var count = 0, total = 0.0;

function getCartFromSession(){
    $.ajax({
        url:'cartsession.php',
        type:'GET',
        dataType:'json',
        success:(cartItems)=>{
            $.each(cartItems ,(idx, cartItem) => {
                for(var i=0;i<cartItem.qty;i++)
                    addToCart(cartItem,false);

            });
        }
    });
}

const ADD = 1;
const REMOVE = 2;


//handle clicking add to cart button.
function addToCart(product,updateSession = true){
  count++;
  total += parseFloat(product.Price);
  const cartItemId =`#cart-${product.ID}`;
  var qty  = 1;
  if($(cartItemId).length  == 0)
  {
      var item =  $('#floating-cart-item').html()
                    .replace('$imageFile',product.Picture)
                    .replace('$productName',product.Name)
                    .replace('$productName',product.Name)
                    .replace('$price',product.Price)
                    .replace('$productId',product.ID)
                    .replace('$productId',product.ID);
      $('.floating-cart-items').append(item);
  }
  else
  {
      qty = $(cartItemId).find('.qty').text();
      $(cartItemId).find('.qty').text(++qty);
  }
  updateCartText();

  $(cartItemId +' .floating-cart-remove')
              .click(function(){
                      if($('.floating-cart-items')
                      .find(cartItemId).length > 0)
                      {
                          var qty =  parseFloat($('.floating-cart-items')
                                              .find(cartItemId).find('.qty')
                                              .text());
                    updateCartInSession(product,qty,qty,REMOVE);

                          total -= (parseFloat($('.floating-cart-items')
                                  .find(cartItemId)
                                  .find('.floating-cart-price')
                                  .text().replace('$','')) * qty);
                                  count-=qty;
                      }
                      $('.floating-cart-items').find(cartItemId).remove();
                      $('#cart-box-icon > span').text(count > 0 ? count : '');

                      updateCartText();
                  });
    
    if(updateSession)
        updateCartInSession(product,qty,1,ADD);
}

function updateCartInSession(product,qty,qtyToupdate,operation){
//    console.log(product);
    var cartItem = {
        ID:product.ID,
        Picture:product.Picture,
        Name:product.Name,
        Price:product.Price,
        qty:qty,
    };
    $.ajax(
        {
        url:'cartsession.php',
        data: {
            cartItem:JSON.stringify(cartItem),
            updateQty:qtyToupdate,
            operation:operation
        },
        type:'POST',
        success:(data)=>{
            console.log(data);
        },
        error:(data)=>{
            console.log('error');
        }
        });
}

//display cart item count and hide overlay cart if it's empty
function updateCartText(){
  $('.floating-cart-header').text(`${ count } items, subtotal $${ total.toFixed(2) }`);
  $('#cart-box-icon > span').text(count > 0 ? count : "0");
  if(count == 0)
      $('.floating-cart').hide();
}

function readQueryString(){
    var queries ={};
      $.each(document.location.search.substr(1).split('&'),function(c,q){
        var i = q.split('=');
        if(!queries[i[0].toString()])
            queries[i[0].toString()] = [];
        queries[i[0].toString()].push(i[1].toString());
      });
      return queries;
}

function loadProducts(type,$after,$append){
    $.ajax({
        url:'filter.php?'+type+'=1',
        type:"GET",
        success:(products)=>{
            products = JSON.parse(products);
            products.pop();
            products.pop();
            bindProductTemplate(products,$after,$append);
        }
    })
}

function bindProductTemplate(products,$after,$append){
    const item = (product) =>  $('#new-product-block').html()
    .replace('$imgsrc',product.Picture)
    .replace('$productText',product.Name)
    .replace('$price',product.Price)
    .replace('$productId',product.ID)
    .replace('$productId',product.ID)
    .replace('$productId',product.ID)
    .replace('$product',JSON.stringify(product).replaceAll("'","").replaceAll("\"","'"));

    if($after)
         $after.after(products.map(item).join(''));
    if($append)
         $append.append(products.map(item).join(''));

    bindhoverevents();
}

function bindhoverevents(){
    $('.productrow .product-block').mouseover(function(){
        $(this).next('.edit-box').css("visibility",'visible');
        $(this).css("background",'#ebebeb');
    });

    $('.edit-box').mouseover(function(){
        $(this).css("visibility",'visible');
        $(this).prev().css("background",'#ebebeb');
    });

    $('.edit-box').mouseleave(function(){
        $(this).css("visibility",'hidden');
        $(this).prev().css("background",'#fff');
    });

    $('.productrow .product-block').mouseleave(function(){
        $(this).next('.edit-box').css("visibility",'hidden');
        $(this).css("background",'#fff');
    });

}