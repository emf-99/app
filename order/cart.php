<?php
session_start();
require '../dbconnect.php';

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
        

        $cartStmt = $conn->prepare("SELECT menu.*, cart.quantity FROM cart JOIN menu ON cart.menu_id = menu.id WHERE cart.order_id = ?");
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
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/order/cart.css">
</head>
<body>
<header>
    <div></div>
    <div>KC’s Smoothies</div>
    <div><img id="cartBtn" src="../image/home_assets/icons/cart_full.svg" height="29" width="37"/></div>
</header>

<div class="content">
    <div class="title">Cart</div>
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
                <p class="price">$<?php echo number_format($item['price']); ?></p>
                <!-- Remove form -->
                <form action="../controller/remove_from_cart.php" method="post">
                    <input type="hidden" name="menu_id" value="<?php echo $item['id']; ?>">
                    <button type="submit" class="remove_button">Remove</button>
                </form>

            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>


    <div class="add_con">
        <a href="../order.php" class="add_btn">Add More</a>
    </div>

    <div class="title">Summary</div>
    <br>
    <div class='price'>
        <div>
            <p>Subtotal ...... $<?php echo number_format($totalPrice, 2); ?></p>
            <p>Tax ................ $<?php echo number_format($tax, 2); ?></p>
            <p class='title'>Total .... $<?php echo number_format($grandTotal, 2); ?></p>
        </div>
    </div>
    <div class="btn_l" id="continueButton">Checkout</div>
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
        window.location.href = 'checkout.php';
    });

    document.getElementById('backButton').addEventListener('click', function() {
        window.location.href = 'order1.php';
    });

    document.getElementById('cartBtn').addEventListener('click', function() {
        window.location.href = 'cart.php';
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
