<?php
session_start(); 
require '../dbconnect.php';


if (isset($_SESSION['user_id'], $_POST['menu_id'])) {
    $userId = $_SESSION['user_id'];
    $menuId = $_POST['menu_id'];
    $quantity = 1; 

   
    $orderCheckStmt = $conn->prepare("SELECT id FROM orders WHERE user_id = ? AND status = 'pending'");
    $orderCheckStmt->execute([$userId]);
    $order = $orderCheckStmt->fetch();

    if (!$order) {

        $orderDate = date('Y-m-d');
        $insertOrderStmt = $conn->prepare("INSERT INTO orders (user_id, status, order_date) VALUES (?, 'pending', ?)");
        $insertOrderStmt->execute([$userId, $orderDate]);
        $orderId = $conn->lastInsertId(); 
        $_SESSION['order_id'] = $orderId; 
    } else {
        $orderId = $order['id']; 
    }


    $insertCartStmt = $conn->prepare("INSERT INTO cart (menu_id, order_id, quantity) VALUES (?, ?, ?)");
    $insertCartStmt->execute([$menuId, $orderId, $quantity]);

    header("Location: ../order/cart.php");
    exit;
} else {
    header("Location: ../order.php?error=missing_data");
    exit;
}
?>