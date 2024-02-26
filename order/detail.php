<?php require '../dbconnect.php'; ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/order/checkout.css">
</head>
<body>
<header>
    <div></div>
    <div>KC’s Smoothies</div>
    <div><img src="../image/home_assets/icons/cart_full.svg" height="29" width="37"/></div>
</header>
<div class="content">
    <div class="title">Cart</div>
    <p class="sm_title">Checkout</p>

    <?php

    if (isset($_GET['id'])) {
        $itemId = $_GET['id'];
    } else {
        // Handle the case where there is no ID in the URL.
        echo "No smoothie selected.";
        exit; // Stop further execution of the script.
    }

    try {
        $sql = "SELECT * FROM menu WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $itemId, PDO::PARAM_INT);
        $stmt->execute();
    
        $item = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if (!$item) {
            echo "Smoothie not found.";
            exit;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit;
    }

    if ($item) {
        echo "<div class='cart_con'>";
        echo "<div class='cart_text'>1 x " . htmlspecialchars($item['title']) . "</div>";
        echo "<div class='cart_con_left'><img src='../image/home_assets/icons/" . htmlspecialchars($item['img']) . "'/></div>";
        echo "<div class='cart_con_right'>";
        echo "<p>" . htmlspecialchars($item['description']) . "</p>";
        echo "</div>";
        echo "</div>";
    } else {
        echo "Smoothie not found.";
    }

    ?>


    <div class="sm_title">Apply Rewards?</div>
    <div class="cart_star">

        <div class="cart_star_left">

            <div>
                <img src="../image/rewards_assets/rewards_star_icon_full.svg" height="25" width="27" style="margin-right: 10px"/>
                <span>10/20</span>
            </div>
            <div class="star_line"></div>

        </div>

        <div class="cart_star_right">

            <div class="Apply_btn">Apply</div>
            <div> *Acquire 20 stars to redeem 1 free drink</div>
        
        </div>

    </div>


    <?php

    $taxRate = 0.08; // 8% tax
    $subtotal = $item['price']; // Fetch the price from the item details
    $tax = $subtotal * $taxRate;
    $total = $subtotal + $tax;


    echo "<div class='price'>";
    echo "    <div>";
    echo "        <p>Subtotal ...... $" . number_format($subtotal, 2) . "</p>";
    echo "        <p>Tax ................ $" . number_format($tax, 2) . "</p>";
    echo "        <p class='title'>Total .... $" . number_format($total, 2) . "</p>";
    echo "    </div>";
    echo "</div>";
    ?>


    <div class="price_right">
        <p>Payment Method</p>
            <div class="pay_btn">
                <button class="apple-pay">
                    <div class="button-content">
                        <p> Apple Pay </p>
                        <img src="../image/cart_assets/apple_pay.svg"/>
                    </div>
                </button>
            </div>
    </div>


    <div class="btn_con">
        <div class="btn_l" id="continueButton">Checkout</div>
    </div>
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

    document.getElementById('continueButton').addEventListener('click', function() {
        window.location.href = 'completed_order.php';
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