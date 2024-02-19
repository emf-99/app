<?php require '../dbconnect.php'; ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/order/cart.css">
</head>
<body>
<header>
    <div></div>
    <div>KC’s Smoothies</div>
    <div><img src="../image/home_assets/icons/cart_full.svg" height="29" width="37"/></div>
</header>
<div class="content">
    <div class="title">Cart</div>
    <p class="sm_title">Review Order</p>
    <div class="cart_con">
        <div class="cart_con_left"><img src="../image/cart_assets/smoothie.svg"/></div>
        <div class="cart_con_right">
            <p>
                Water base, Banana, Strawberry, Mixed Berries, Extra Yogurt
            </p>
            <div class="cart_btns">
                <div>Edit</div>
                <div>Remove</div>
            </div>
        </div>
    </div>
    <div class="add_con">
        <div class="add_btn">Add +</div>
    </div>
    <div class="title">Summary</div>
    <br>
    <div>
        Subtotal.......$5.00
    </div>
    <div>
        Tax ................ $0.00
    </div>
    <div class="title">Total .... $5.00</div>
    <div class="btn_con">
        <div class="btn_l" id="continueButton">Checkout</div>

    </div>
</div>
<menu>
    <div id="home">
        <img src="../image/home_assets/icons/home_icon_neutral.svg" height="30"/>
        <div>Home</div>
    </div>
    <div id="map">
        <img src="../image/home_assets/icons/map_icon_neutral.svg" height="30"/>
        <div>Map</div>
    </div>
    <div class="active" id="order">
        <img src="../image/home_assets/icons/order_icon_selected.svg" height="30"/>
        <div>Order</div>
    </div>
    <div id="rewards">
        <img src="../image/home_assets/icons/rewards_icon_neutral.svg" height="30"/>
        <div>Rewards</div>
    </div>
    <div id="account">
        <img src="../image/home_assets/icons/account_icon_neutral.svg" height="30"/>
        <div>Account</div>
    </div>
</menu>

<script>

    document.getElementById('continueButton').addEventListener('click', function() {
        window.location.href = 'checkout.php';
    });

    document.getElementById('backButton').addEventListener('click', function() {
        window.location.href = 'order1.php';
    });


    function navigateToPage(page) {
        window.location.href = page + '.php';
    }

    
    document.getElementById('home').addEventListener('click', function() {
        navigateToPage('../home');
    });

    document.getElementById('map').addEventListener('click', function() {
        navigateToPage('../map');
    });

    document.getElementById('order').addEventListener('click', function() {
        navigateToPage('../order');
    });

    document.getElementById('rewards').addEventListener('click', function() {
        navigateToPage('../rewards');
    });

    document.getElementById('account').addEventListener('click', function() {
        navigateToPage('../account');
    });

</script>

</body>
</html>