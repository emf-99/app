<?php
session_start();
require '../dbconnect.php';

if (isset($_SESSION['user_id']) && isset($_POST['menu_id'])) {
    $userId = $_SESSION['user_id'];
    $menuId = $_POST['menu_id'];

    // Fetch the active (pending) order for the user to get the order_id
    $orderStmt = $conn->prepare("SELECT id FROM orders WHERE user_id = ? AND status = 'pending'");
    $orderStmt->execute([$userId]);
    $order = $orderStmt->fetch();

    if ($order) {
        $orderId = $order['id'];
        
        // Now, delete the item from the cart table based on the menu_id and the current order_id
        $deleteStmt = $conn->prepare("DELETE FROM cart WHERE menu_id = ? AND order_id = ?");
        $deleteStmt->execute([$menuId, $orderId]);

        // Redirect back to the cart page after deletion
        header("Location: ../order/cart.php");
        exit;
    } else {
        // Handle case where there is no active order (which means there's nothing to remove)
        echo "No active order found.";
        // Redirect or display an error message as needed
    }
} else {
    echo "Invalid request.";
    // Redirect or display an error message as needed
}
?>
