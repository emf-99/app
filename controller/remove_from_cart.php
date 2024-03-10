<?php
session_start();
require '../dbconnect.php';

if (isset($_SESSION['user_id']) && isset($_POST['menu_id'])) {
    $userId = $_SESSION['user_id'];
    $menuId = $_POST['menu_id'];


    $orderStmt = $conn->prepare("SELECT id FROM orders WHERE user_id = ? AND status = 'pending'");
    $orderStmt->execute([$userId]);
    $order = $orderStmt->fetch();

    if ($order) {
        $orderId = $order['id'];
        

        $deleteStmt = $conn->prepare("DELETE FROM cart WHERE menu_id = ? AND order_id = ?");
        $deleteStmt->execute([$menuId, $orderId]);


        header("Location: ../order/cart.php");
        exit;
    } else {

        echo "No active order found.";

    }
} else {
    echo "Invalid request.";
}
?>
