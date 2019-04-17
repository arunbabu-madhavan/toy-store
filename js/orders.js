$(()=>{
    var orders = [];
    $.ajax({
        url:'api/orders.php',
        type:"GET",
        dataType:'json',
        success:(orders)=>{
            var orderID = 0;
            for(var i=0;i<orders.length;i++)
                orders[i].orderID = 1;
            for(var i=0;i<2;i++)
                orders[i].orderID = 2;

           var orderItemElement = getOrderTemplate();
           for(var i=0;i<orders.length;i++)
           {
            const order = orders[i];
            if(i !=0 &&  orders[i].orderID != orders[i-1].orderID)
               { 
              $('.order-history-container').append(orderItemElement);
               orderItemElement = getOrderTemplate();
            }
            
                productItem = $('#order-product-item').html();
                productItem = productItem.replace("$orderPicture",order.Picture)
                                    .replace("$productID",order.ID)
                                    .replace("$productName",order.Name)
                                    .replace("$productPrice",order.Price)
                                    .replace("$productQty",order.qty)
                orderItemElement.find('product-list').append(productItem);
           }
           $('.order-history-container').append(orderItemElement);

           function getOrderTemplate(){
            templateHTML = $('#order-item').html();
            templateHTML = templateHTML.replace("$orderDate","Jan 3, 2019")
                     .replace("$orderTotal","213");
            return $(templateHTML);
           }
        }});
       
});