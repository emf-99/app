<?php
session_start();
require '../dbconnect.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

// var_dump($_POST);


if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $quantity = 1; 

    if (isset($_SESSION['order_id']) || !$_SESSION['order_id']) {
        $orderCheckStmt = $conn->prepare("SELECT id FROM orders WHERE user_id = ? AND status = 'pending'");
        $orderCheckStmt->execute([$userId]);
        $order = $orderCheckStmt->fetch();
        $orderId = $order['id'];

        if (!$order) {
            $orderDate = date('Y-m-d');
            $insertOrderStmt = $conn->prepare("INSERT INTO orders (user_id, status, order_date) VALUES (?, 'pending', ?)");
            $insertOrderStmt->execute([$userId, $orderDate]);
            $orderId = $conn->lastInsertId();
        }        
    } else {
        $orderId = $_SESSION['order_id'];
    }
 
    $_SESSION['order_id'] = $orderId;

    if (isset($_POST['menu_id']) && $_POST['menu_id'] == 6) {
        $customDescription = $_POST['custom_description'] ?? '';
        $menuId = $_POST['menu_id'];
        $customDescription = $_POST['custom_description'] ?? 'Default description';
    
        $insertCartStmt = $conn->prepare("INSERT INTO cart (menu_id, order_id, quantity, custom_description) VALUES (?, ?, ?, ?)");
        $insertCartStmt->execute([$menuId, $orderId, $quantity, $customDescription]);

    }

    elseif (isset($_POST['menu_id'])) {
        $menuId = $_POST['menu_id'];

        $insertCartStmt = $conn->prepare("INSERT INTO cart (menu_id, order_id, quantity) VALUES (?, ?, ?)");
        $insertCartStmt->execute([$menuId, $orderId, $quantity]);
    }


    header("Location: ../order/cart.php");
    exit;
} else {
    header("Location: ../order.php?error=not_logged_in_or_missing_data");
    exit;
}
?>
