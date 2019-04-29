$(document).ready(function () {
    $(function () {
        $("#accordion").accordion({
            active: 0,
            collapsible: true,
            header: "h3",
            heightStyle: "content",
            icons: {
                "header": "ui-icon-caret-1-e",
                "activeHeader": "ui-icon-caret-1-sw"
            }
        });
    });

    $("#checkoutBtn").click(function (e) {
        $('#accordion').accordion('option', 'active', 1);
    });

    $("#pickCheckout").click(function (e) {
        var answer = $('input[name=method]:checked').val();
        if (answer === "register") {
            window.location.href = "register.php";
        } else if (answer == "login") {
            window.location.href = "login.php";
        } else
            $('#accordion').accordion('option', 'active', 2);
    });

    $("#pickBilling").click(function (e) {
        var answer = $('input[name=method]:checked').val();
        if (answer === "register") {
            window.location.href = "register.php";
        } else if (answer == "login") {
            window.location.href = "login.php";
        } else
            $('#accordion').accordion('option', 'active', 3);
    });

    $("#pickAddress").click(function (e) {
        var answer = $('input[name=method]:checked').val();
        if (answer === "register") {
            window.location.href = "register.php";
        } else if (answer == "login") {
            window.location.href = "login.php";
        } else
            $('#accordion').accordion('option', 'active', 4);
    });

    $("#doneCheckout").click(function (e) {
        var answer = $('input[name=method]:checked').val();

    });

    if (location.hash.indexOf('#checkout') != -1) {
        setTimeout(function () {
            $("#accountDetails").click();
        }, 1);
    }

    $(".email").on('focusout', function () {
        var pattern = new RegExp(/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/);
        var email = $(this).val();
        if (pattern.test(email)) {
            $("#emailInfo").text("");
        } else {
            $("#emailInfo").text("Please use a valid email address, such as user@example.com.");
        }
    });

    $(".phone").on('focusout', function () {
        var pattern = new RegExp(/^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$/);
        var email = $(this).val();
        if (pattern.test(email)) {
            $("#phoneInfo").text("");
        } else {
            $("#phoneInfo").text("Please use a valid phone number.");
        }
    });

    $(".billingAddress").on('blur', function () {

        var address = $(this).val();
        if (!address && address === '') {
            $("#pickBilling").prop("disabled", true);
        } else {
            $("#pickBilling").prop("disabled", false);
            $("#pickShipping").prop("disabled", false);
        }
    });

    $(".shippingAddress").on('blur', function () {

        var address = $(this).val();
        if (!address && address === '') {
            $("#pickAddress").prop("disabled", true);
        } else {
            $("#pickAddress").prop("disabled", false);
        }
    });



});


function removeCartItem(productId, control) {
    const cartItemId = `#cart-${productId}`;
    $(cartItemId + ' .floating-cart-remove').click();
    $(control).parents('.cartItem').remove();
}

function updateCartItem(product, control) {
    const cartItemId = `#cart-${product.ID}`;
    $(cartItemId + ' .floating-cart-remove').click();
    var qty = $(control).siblings('span').find('input').val();
    if (qty == 0) {
        $(control).parents('.cartItem').remove();
    } else {

        if (+qty > +product.Quantity) {
            qty = product.Quantity;
            $(control).siblings('span').find('input').val(qty);
        }

        for (let i = 0; i < qty; i++)
            addToCart(product, true);

        $(control).parents('.cartItem').find('.itemTotal').text("  $ " +
            (qty * product.Price).toFixed(2));
    }
}