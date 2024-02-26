<?php
session_start();
require '../dbconnect.php';

if (isset($_SESSION['user_id'], $_SESSION['order_id'])) {
    $userId = $_SESSION['user_id'];
    $orderId = $_SESSION['order_id']; 
    

    $conn->beginTransaction();

    try {

        $updateOrderStmt = $conn->prepare("UPDATE orders SET status = 'complete' WHERE id = ? AND user_id = ?");
        $updateOrderStmt->execute([$orderId, $userId]);


        $clearCartStmt = $conn->prepare("DELETE FROM cart WHERE order_id = ?");
        $clearCartStmt->execute([$orderId]);

        
        $conn->commit();

       
        unset($_SESSION['order_id']);


        header("Location: ../order/completed_order.php"); 
        exit;
    } catch (Exception $e) {

        $conn->rollBack();
        echo "Error completing order: " . $e->getMessage();

    }
} else {
    
    header("Location: ../home.php");

    exit;
}
?>
