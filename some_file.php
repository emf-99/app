<?php
require 'dbconnect.php'; 

$tables = [
    'cart' => 'SELECT order_id, menu_id, quantity, status FROM cart',
    'menu' => 'SELECT id, title, img, add_ons, price, menu FROM menu',
    'orders' => 'SELECT id, cart_id, order_date FROM orders',
    'users' => 'SELECT id, first_name, last_name, email, password FROM users',
];

foreach ($tables as $table => $query) {
    echo "Data from $table table:<br>";
    $stmt = $conn->query($query);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($results as $row) {
        foreach ($row as $column => $value) {
            echo "$column: $value, ";
        }
        echo "<br>";
    }
    echo "<br>";
}
?>
