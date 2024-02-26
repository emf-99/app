<?php
$host = 'localhost'; 
$dbname = 'idm216'; 
$username = 'root'; 
$password = 'root'; 

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully"; 
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
