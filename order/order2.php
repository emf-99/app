<?php 
session_start();
require '../dbconnect.php'; 

if (basename($_SERVER['PHP_SELF']) !== 'register.php') {
    if (!isset($_SESSION['user_id'])) {
        header('Location: register.php');
        exit();
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/order/order1.css">
    <script src="../js/script.js"></script>
</head>
<body>
<header>
    <div> </div>
    <div>KC’s Smoothies</div>
    <div><img src="../image/home_assets/icons/cart_empty.svg" height="28" width="36"/></div>
</header>

<div class="content">
    <div class="xy_con">
        <div class="title">Order</div>
        <div class="order_list">
            <a href="">Previous</a>
            <a href="">Featured</a>
            <a href="">Custom</a>
        </div>
    </div>

    <div class="center_content">
    <div class="order_con"> 

        <div class="order_con_title">Fruit Selection</div>

            <div class="order_add">
                <div class="order_add_right">
                    <form id="fruitSelections">
                        <input type="checkbox" name="fruit" value="Strawberry" id="strawberry" class="custom_radio"> <label for="strawberry">Strawberry</label><br>
                        <input type="checkbox" name="fruit" value="Banana" id="banana" class="custom_radio"> <label for="banana">Banana</label><br>
                        <input type="checkbox" name="fruit" value="Mango" id="mango" class="custom_radio"> <label for="mango">Mango</label><br>
                        <input type="checkbox" name="fruit" value="Mixed Berry" id="mixedBerry" class="custom_radio"> <label for="mixedBerry">Mixed Berry</label><br>
                    </form>
                </div>


                <div class="order_img">
                    <img src="../image/order_assets/blender2.svg"/>
                </div> 
            </div>


            <div class="order_btn_line">
                <div class="order_btn" id="backButton">< Back</div>
                <div class="order_line"><img src="../image/order_assets/progress_bar_narrow2.svg"/></div>
                <div class="order_btn" id="continueButton" onclick="submitFruitSelections()">Continue ></div>
            </div>

        </div>
    </div>
</div>       


<menu>
    <div id="home">
        <img src="../image/home_assets/icons/home_icon_neutral.svg" height="35" width="35"/>
    </div>
    <div id="map">
        <img src="../image/home_assets/icons/map_icon_neutral.svg" height="35" width="35"/>
    </div>
    <div class="active" id="order">
        <img src="../image/home_assets/icons/order_icon_selected.svg" height="35" width="35"/>
    </div>
    <div id="rewards">
        <img src="../image/home_assets/icons/rewards_icon_neutral.svg" height="35" width="35"/>
    </div>
    <div id="account">
        <img src="../image/home_assets/icons/account_icon_neutral.svg" height="35" width="35"/>
    </div>
</menu>

<script>

    document.getElementById('continueButton').addEventListener('click', function() {
        window.location.href = 'order3.php';
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
