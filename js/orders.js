$(()=>{
    var orders = [];
    $.ajax({
        url:'api/orders.php',
        type:"GET",
        dataType:'json',
        success:(orders)=>{
            if(orders == null || orders.length == 0)
                return;

           var orderItemElement = getOrderTemplate(orders[0]);
           for(var i=0;i<orders.length;i++)
           {
            const order = orders[i];
            if(i !=0 &&  orders[i].orderID != orders[i-1].orderID)
               { 
              $('.order-history-container').append(orderItemElement);
               orderItemElement = getOrderTemplate();
            }
                productItem = $('#order-product-item').html();
                productItem = productItem.replace("$orderPicture",order.Picture.trim())
                                    .replace("$productID",order.ID)
                                    .replace("$productName",order.Name)
                                    .replace("$productPrice",order.Price)
                                    .replace("$productQty",order.qty)
                orderItemElement.find('product-list').append(productItem);
           }
           $('.order-history-container').append(orderItemElement);

           function getOrderTemplate(order){
            templateHTML = $('#order-item').html();
            templateHTML = templateHTML.replace("$orderDate",order.Date)
                     .replace("$orderTotal",order.total)
                     .replace("$Shippingname",order.shName)
                     .replace("$ShippingAddress1",order.shAddress)
                     .replace("$ShippingCity",order.shCity)
                     .replace("$ShippingZip",order.shZip)
                     .replace("$ShippingPhone",order.shPhone)
                     .replace("$Billingname",order.bName)
                     .replace("$BillingAddress1",order.bAddress)
                     .replace("$BillingCity",order.bCity)
                     .replace("$BillingZip",order.bZip)
                     .replace("$BillingPhone",order.bPhone)
            return $(templateHTML);
           }
        }});
       
});