<?php
// Database configuration
$host = 'localhost'; // or your host
$dbname = 'idm216'; // your database name
$username = 'root'; // your database username
$password = 'root'; // your database password

// Create connection
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Check connection
try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
