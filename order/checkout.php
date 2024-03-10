<?php 
session_start();
require '../dbconnect.php';

if (basename($_SERVER['PHP_SELF']) !== 'register.php') {
    if (!isset($_SESSION['user_id'])) {
        header('Location: register.php');
        exit();
    }
}

$totalPrice = 0;
$taxRate = 0.08;
$items = [];

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    $orderStmt = $conn->prepare("SELECT id FROM orders WHERE user_id = ? AND status = 'pending'");
    $orderStmt->execute([$userId]);
    $order = $orderStmt->fetch();

    if ($order) {
        $orderId = $order['id'];

        $cartStmt = $conn->prepare("SELECT menu.*, cart.quantity, cart.custom_description FROM cart JOIN menu ON cart.menu_id = menu.id WHERE cart.order_id = ?");
        $cartStmt->execute([$orderId]);
        $items = $cartStmt->fetchAll();

        foreach ($items as $item) {
            $itemTotal = $item['price'] * $item['quantity'];
            $totalPrice += $itemTotal;
        }

        $tax = $totalPrice * $taxRate;
        $grandTotal = $totalPrice + $tax;
    }
}

if (empty($items)) {
    echo "<p>Your cart is empty.</p>";
} else {

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/order/checkout.css">
</head>
<body>
<header>
    <div></div>
    <div>KC’s Smoothies</div>
    <div><img id="cartBtn" src="../image/home_assets/icons/cart_full.svg" height="29" width="37"/></div>
</header>

<div class="content">
    <div class="title">Checkout</div>
    <p class="sm_title">Review Order</p>

    <?php if (!empty($items)): ?>
    <?php foreach ($items as $item): ?>
        <div class="cart_con">
            <div class="cart_con_left">
                <img src="../image/home_assets/icons/<?php echo htmlspecialchars($item['img']); ?>"/>
            </div>
            <div class="cart_con_right">
                <h1><?php echo htmlspecialchars($item['title']); ?></h1>
                <p><?php echo htmlspecialchars($item['description']); ?></p>
                <?php if (!empty($item['custom_description'])): ?>
                        <p>Customization: <?php echo htmlspecialchars($item['custom_description']); ?></p>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

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
            <div>
                *Aquire 20 stars to redeem 1 free drink
            </div>
        </div>
    </div>
    <div class='price'>
        <div>
            <p>Subtotal ...... $<?php echo number_format($totalPrice, 2); ?></p>
            <p>Tax ................ $<?php echo number_format($tax, 2); ?></p>
            <p class='title'>Total .... $<?php echo number_format($grandTotal, 2); ?></p>
        </div>
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


                </button>
            </div>
        </div>
    <div class="btn_con">
        <form action="../controller/complete_order.php" method="post">
            <button type="submit" class="btn_l" id="checkoutButton">Checkout</button>
        </form>
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

document.getElementById('checkoutButton').addEventListener('click', function() {
    window.location.href = '../controller/complete_order.php';
});

    // document.getElementById('backButton').addEventListener('click', function() {
    //     window.location.href = 'order1.php';
    // });


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