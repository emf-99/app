<?php require 'dbconnect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rewards</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/rewards.css">
</head>
<body>
<header>
    <div></div>
    <div>KC’s Smoothies</div>
    <div><img src="image/home_assets/icons/cart_empty.svg" height="28" width="36"/></div>
</header>
<div class="content">
    <div class="title">Rewards</div>
    <div class="content_top">
        <div class="home_title" style="color: white">Rewards</div>
        <div class="StarIcon">
            <img src="image/home_assets/icons/rewards_star_icon_full.svg" height="25" width="27"/>
            <span>10/20</span>
        </div>
        <div class="line"></div>
    </div>
    <div class="star_list">
        <span>1</span> <img src="image/home_assets/icons/rewards_star_icon_full.svg" height="25" width="27"/> <p>Per mobile order</p>
    </div>
    <div class="star_list">
        <span>2</span> <img src="image/home_assets/icons/rewards_star_icon_full.svg" height="25" width="27"/> <p>Per mobile order with add-on</p>
    </div>
    <div class="star_list">
        <span>20</span> <img src="image/home_assets/icons/rewards_star_icon_full.svg" height="25" width="27"/> <p>= 1 free smoothie</p>
    </div>

    <div class="rewards_text">
        Apply stars to order at checkout. Stars never expire.
    </div>
    <div class="btn" id="legal">Legal</div>
</div>

<menu>
    <div id="home">
        <img src="image/home_assets/icons/home_icon_neutral.svg" height="25"/>
    </div>
    <div id="map">
        <img src="image/home_assets/icons/map_icon_neutral.svg" height="30"/>
    </div>
    <div id="order">
        <img src="image/home_assets/icons/order_icon_neutral.svg" height="40"/>
    </div>
    <div class="active" id="rewards">
        <img src="image/home_assets/icons/rewards_icon_selected.svg" height="30"/>
    </div>
    <div id="account">
        <img src="image/home_assets/icons/account_icon_neutral.svg" height="25"/>
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
