<?php 

session_start(); // Start the session at the beginning
require 'dbconnect.php';

?>


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
    <div><img id="cartBtn" src="image/home_assets/icons/cart_empty.svg" height="28" width="36"/></div>
</header>
<div class="content">
    <div class="title">Order</div>
    <div class="order_list">
        <a>Previous</a>
        <a>Featured</a>
        <a href="order/order1.php">Custom</a>
    </div>

<?php

function determineClassBasedOnTitle($title) {
    $normalizedTitle = strtolower($title);
    
    if (strpos($normalizedTitle, 'pb and banana') !== false) {
        return 'pb_and_banana_smoothie';
    } elseif (strpos($normalizedTitle, 'exclusive tarro') !== false) {
        return 'taro_smoothie';
    } elseif (strpos($normalizedTitle, 'fruit salad') !== false) {
        return 'fruit_salad';
    } elseif (strpos($normalizedTitle, 'custom berry') !== false) {
        return 'custom_berry_smoothie';
    } elseif (strpos($normalizedTitle, 'custom mango') !== false) {
        return 'custom_mango_smoothie';
    } elseif (strpos($normalizedTitle, 'custom') !== false) {
        return 'custom_smoothie';
    } else {
        return 'default_smoothie'; 
    }
}

try {

    $sql = "SELECT * FROM menu"; 
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $menuItems = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// dummy data for order
$order=[
"id"=>9,
"cart_id"=>1,
"user_id"=>3,
];

echo "<div class='order_shop_list'>";

foreach ($menuItems as $item) {

    $css_class = determineClassBasedOnTitle($item['title']);
    echo "<form method='post' action='controller/add_to_cart.php' class='" . htmlspecialchars($css_class) . "'>";
        echo "<button class='button'>"; 
            echo "<div class='button-content'>";
                echo "<div class='button-text-smoothie'>";
                    echo "<h1>" . htmlspecialchars($item['title']) . "</h1>";
                    echo "<p>" . htmlspecialchars($item['description']) . "</p>";
                    echo "<p> $" . htmlspecialchars($item['price']) . "</p>"; 
                echo "</div>";
                echo '<img src="image/home_assets/icons/' . htmlspecialchars($item['img']) . '" alt="' . htmlspecialchars($item['title']) . ' image">';
            echo "</div>";
            echo "<input type='hidden' name='order_id' value='" . htmlspecialchars($order['id']) . "'>";
            echo "<input type='hidden' name='menu_id' value='" . htmlspecialchars($item['id']) . "'>";
        echo "</button>";
    echo "</form>";

}

echo "</div>";

?>

</div>

<menu>
    <div id="home">
        <img src="../image/home_assets/icons/home_icon_neutral.svg" height="25"/>
    </div>
    <div id="map">
        <img src="../image/home_assets/icons/map_icon_neutral.svg" height="30"/>
    </div>
    <div class="active" id="order">
        <img src="../image/home_assets/icons/order_icon_selected.svg" height="40"/>
    </div>
    <div id="rewards">
        <img src="../image/home_assets/icons/rewards_icon_neutral.svg" height="30"/>
    </div>
    <div id="account">
        <img src="../image/home_assets/icons/account_icon_neutral.svg" height="25"/>
    </div>
</menu>

<script>

    document.getElementById('cartBtn').addEventListener('click', function() {
        window.location.href = 'order/cart.php';
    });
    
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
