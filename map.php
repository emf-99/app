<?php require 'dbconnect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Map</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/map.css">
</head>
<body>
<header>
    <div> </div>
    <div>KC’s Smoothies</div>
    <div><img src="image/home_assets/icons/cart_empty.svg" height="28" width="36"/></div>
</header>
<div class="content">
    <div class="map_title">Map</div>
    <div class="map_sm_title">Hours</div>
    <p>Monday-Thursday: 9 AM-5:00 PM</p>
    <p>Friday: 10 AM-6:00 PM</p>
    <p>Saturday: 10:30 AM-6:30 PM</p>
    <p>Sunday: Closed</p>
    <div class="map_contact">
        <span>Contact:</span> (610)-329-8294
    </div>
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d226378.3692678063!2d-77.06734529475301!3d38.876558399348006!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89b7b834fb4029d3%3A0x9270eee67ab54203!2s1200%20Pennsylvania%20Ave.%20SE%2C%20Washington%2C%20DC%2020003%2C%20USA!5e0!3m2!1sen!2shk!4v1707619985482!5m2!1sen!2shk" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div class="map_btn"><img src="image/map_assets/get_directions.svg"/></div>
    </div>
</div>
<menu>
    <div id="home">
        <img src="image/home_assets/icons/home_icon_neutral.svg" height="30"/>
        <div>Home</div>
    </div>
    <div class="active" id="map">
        <img src="image/home_assets/icons/map_icon_selected.svg" height="30"/>
        <div>Map</div>
    </div>
    <div id="order">
        <img src="image/home_assets/icons/order_icon_neutral.svg" height="30"/>
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