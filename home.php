<?php 
session_start();
require 'dbconnect.php';

if (basename($_SERVER['PHP_SELF']) !== 'register.php') {
    if (!isset($_SESSION['user_id'])) {
        header('Location: register.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <header>
        <div> </div>
        <div>KC’s Smoothies</div>
        <div><img src="image/home_assets/icons/cart_empty.svg" height="28" width="36"/></div>
    </header>

<div class="content">
    <div class="main_home_title">Home</div> <!-- Added home header -->
    <div class="content_top">
        <div class="home_title" style="color: white">Rewards</div>
        <div class="StarIcon">
            <span>10/20</span> <!-- Switch order of span and star icon-->
            <img src="image/home_assets/icons/rewards_star_icon_full.svg" height="25" width="27"/>
        </div>
        <div class="line"></div>
    </div>
    <div class="home_list">
        <div class="home_title">Everyone's Favorites</div>
        <div class="home_list_con">
            <div>
            <div class="item_container">
                <img src="image/home_assets/icons/custom_mango_icon.svg"/>
                <span>Custom Mango</span>
            </div>
            </div>
            <div>
            <div class="item_container">
                <img src="image/home_assets/icons/custom_berry_icon.svg"/>
                <span>Custom Berry</span>
            </div>
            </div>
            <div id="custom">
            <div class="item_container">
                <img src="image/home_assets/icons/smoothie.svg"/>
                <span class="custom">Custom</span>
            </div>
            </div>
        </div>
    </div>
    <div class="home_list">
        <div class="home_title">Featured</div>
        <div class="home_list_con">
            <div>
            <div class="item_container">
                <img src="image/home_assets/icons/pb_smoothie.svg"/>
                <span>PB & Banana</span>
            </div>
            </div>
            <div>
            <div class="item_container">
                <img src="image/home_assets/icons/taro_smoothie.svg"/>
                <span>Exclusive Tarro</span>
            </div>
            </div>
            <div>
            <div class="item_container">
                <img src="image/home_assets/icons/fruit_salad.svg"/>
                <span class="custom">Fruit Salad</span>
            </div>
            </div>
        </div>
    </div>
</div>
<menu>
    <div class="active" id="home">
        <img src="image/home_assets/icons/home_icon_selected.svg" height="35" width="35"/>
    </div>
    <div id="map">
        <img src="image/home_assets/icons/map_icon_neutral.svg" height="35" width="35"/>
    </div>
    <div id="order">
        <img src="image/home_assets/icons/order_icon_neutral.svg" height="40" width="40"/>
    </div>
    <div id="rewards">
        <img src="image/home_assets/icons/rewards_icon_neutral.svg" height="35" width="35"/>
    </div>
    <div id="account">
        <img src="image/home_assets/icons/account_icon_neutral.svg" height="35" width="35"/>
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

    document.getElementById('custom').addEventListener('click', function() {
        navigateToPage('order/order1');
    });
</script>