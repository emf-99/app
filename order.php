<?php require 'dbconnect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/order.css">
</head>
<body>
<header>
    <div> </div>
    <div>KC’s Smoothies</div>
    <div><img src="image/home_assets/icons/cart_empty.svg" height="28" width="36"/></div>
</header>
<div class="content">
    <div class="title">Order</div>
    <div class="order_list">
        <a>Previous</a>
        <a>Featured</a>
        <a href="order/order1.php">Custom</a>
    </div>

    <div class="order_shop_list">

        <div class="pb-smoothie">
            <button class="pb-smoothie button">
                <div class="button-content">
                <div class="button-text-smoothie">
                <h1> PB & Bananna</h1>
                <p> Water base, Peanut butter, Banana</p>
                </div>
                <img src="image/order_assets/pb_smoothie.svg">
                </div>
            </button>
        </div>

        <div class="taro-smoothie">
            <button class="taro-smoothie button">
                <div class="button-content">
                <div class="button-text-smoothie">
                <h1> Exclusive Taro </h1>
                <p> Milk base, Taro, Honey</p>
                </div>
                <img src="image/order_assets/taro_smoothie.svg">
                </div>
            </button>
        </div>

        <div class="fruit-salad">
            <button class="fruit-salad button">
                <div class="button-content">
                <div class="button-text-smoothie">
                <h1> Fruit Salad </h1>
                <p> Bananas, Mixed Berries, Pineapple, Strawberries, Mango</p>
                </div>
                <img src="image/order_assets/fruit_salad.svg">
                </div>
            </button>
        </div>

        <div class="berry-smoothie">
            <button class="berry-smoothie button">
                <div class="button-content">
                <div class="button-text-smoothie">
                <h1> Mixed Berry </h1>
                <p> Water base, Mixed Berries, Pineapple, Strawberries, Mango</p>
                </div>
                <img src="image/order_assets/mixed_berry.svg">
                </div>
            </button>
        </div>

    </div>

</div>
<menu>
    <div id="home">
        <img src="image/home_assets/icons/home_icon_neutral.svg" height="30"/>
        <div>Home</div>
    </div>
    <div id="map">
        <img src="image/home_assets/icons/map_icon_neutral.svg" height="30"/>
        <div>Map</div>
    </div>
    <div class="active" id="order">
        <img src="image/home_assets/icons/order_icon_selected.svg" height="30"/>
        <div>Order</div>
    </div>
    <div id="rewards">
        <img src="image/home_assets/icons/rewards_icon_neutral.svg" height="30"/>
        <div>Rewards</div>
    </div>
    <div id="account">
        <img src="image/home_assets/icons/account_icon_neutral.svg" height="30"/>
        <div>Account</div>
    </div>
</menu>

<script>
    
    function navigateToPage(page) {
        window.location.href = page + '.php';
    }

    
    document.getElementById('home').addEventListener('click', function() {
        navigateToPage('home');
    });

    document.getElementById('map').addEventListener('click', function() {
        navigateToPage('map');
    });

    document.getElementById('order').addEventListener('click', function() {
        navigateToPage('order');
    });

    document.getElementById('rewards').addEventListener('click', function() {
        navigateToPage('rewards');
    });

    document.getElementById('account').addEventListener('click', function() {
        navigateToPage('account');
    });
</script>

</body>
</html>
