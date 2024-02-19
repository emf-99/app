<?php require '../dbconnect.php'; ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Completed Order</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/order/completed.css">
</head>
<body>
<header>
    <div></div>
    <div>KC’s Smoothies</div>
    <div><img src="../image/home_assets/icons/cart_empty.svg" height="28" width="36"/></div>
</header>
<div class="content">
    <div class="completed">
        <div class="com_title">Thank you!</div>
        <p>Pickup in 10 min</p>
        <p>Order <span>#32</span></p>
        <div class="com_img"><img src="../image/cart_assets/blender_icon.svg"/></div>
        <p>Cutting your fruit ...</p>
        <div class="line"></div>
        <div class="map">
            <div class="map_con">
                <iframe class="iframe_map"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d226378.3692678063!2d-77.06734529475301!3d38.876558399348006!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89b7b834fb4029d3%3A0x9270eee67ab54203!2s1200%20Pennsylvania%20Ave.%20SE%2C%20Washington%2C%20DC%2020003%2C%20USA!5e0!3m2!1sen!2shk!4v1707619985482!5m2!1sen!2shk"
                        width="100%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="map_btn">Open Map</div>
            </div>
            <div class="map_right">
                <div>
                    <div style="display: flex; align-items: center;justify-content: space-between">
                        <img src="../image/rewards_assets/rewards_star_icon_full.svg" height="25" width="27"/>
                        <span>10/20</span>
                    </div>
                    <div class="sm_line"></div>
                </div>
                <div class="done_btn" id="continueButton">Done</div>
            </div>
        </div>
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
        window.location.href = '../home.php';
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