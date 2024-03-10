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

        <div class="order_con_title">Add-Ons</div>

            <div class="order_add">
                <div class="order_add_right">
                    <form id="addOnSelections">
                        <input type="checkbox" name="addOns" value="Yogurt" id="yogurt" class="custom_radio"> <label for="yogurt">Yogurt ($.60)</label><br>
                        <input type="checkbox" name="addOns" value="Protein" id="protein" class="custom_radio"> <label for="protein">Protein ($1)</label><br>
                        <input type="checkbox" name="addOns" value="No Add Ons" id="none" class="custom_radio"> <label for="none">No Add-Ons</label><br>
                    </form>
                </div>


                <div class="order_img">
                    <img src="../image/order_assets/blender3.svg"/>
                </div> 
            </div>


            <div class="order_btn_line">

                <div class="order_btn" id="backButton">< Back</div>
                <div class="order_line"><img src="../image/order_assets/progress_bar_narrow3.svg"/></div>

                <form action="../controller/add_to_cart.php" method="post">
                    <input type="hidden" name="custom_description" id="customDescriptionInput" value="">
                    <input type="hidden" name="menu_id" value="6">
                    <button type="submit" class="order_btn" id="continueButton3">Continue ></button>
                </form>
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

    document.getElementById('continueButton3').addEventListener('click', function() {
        window.location.href = 'cart.php';
    });

    document.getElementById('backButton').addEventListener('click', function() {
        window.location.href = 'order2.php';
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
