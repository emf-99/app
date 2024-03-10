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
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Account</title>
    <link rel="stylesheet" href="css/account.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<header>
    <div> </div>
    
    <div>KC’s Smoothies</div>
    <div><img src="image/home_assets/icons/cart_empty.svg" height="28" width="36"/></div>
</header>
<div class="content">
    <div class="account_title">Account</div> <!-- Created new div for account title -->
    <div class="header_img">
        <img src="image/account_assets/account_icon_selected.svg"/>
    </div>
    <div class="order_btn_list">
        <div id="privacy" class="unclick" >Privacy</div>
        <div id="settings" class="unclick">Settings</div>
        <div id="legal" class="unclick">Legal</div>
        <div id="more" class="unclick">More</div>
        <div id="logout"> <a href="controller/logout.php">Log Out</a> </div>
    </div>
</div>
<menu>
    <div id="home">
        <img src="image/home_assets/icons/home_icon_neutral.svg" height="35"/>
    </div>
    <div id="map">
        <img src="image/home_assets/icons/map_icon_neutral.svg" height="30"/>
    </div>
    <div id="order">
        <img src="image/home_assets/icons/order_icon_neutral.svg" height="40"/>
    </div>
    <div id="rewards">
        <img src="image/home_assets/icons/rewards_icon_neutral.svg" height="30"/>
    </div>
    <div class="active" id="account">
        <img src="image/home_assets/icons/account_icon_selected.svg" height="30"/>
    </div>
</menu>

<script>

    function navigateToPage(page) {
        window.location.href = page + '.php';
    }

    document.getElementById('privacy').addEventListener('click', function() {
        navigateToPage('privacy');
    });

    document.getElementById('settings').addEventListener('click', function() {
        navigateToPage('settings');
    });

    document.getElementById('legal').addEventListener('click', function() {
        navigateToPage('legal');
    });

    document.getElementById('more').addEventListener('click', function() {
        navigateToPage('more');
    });

    document.getElementById('logout').addEventListener('click', function() {
        navigateToPage('register');
    });

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
