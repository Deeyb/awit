<?php
$host = 'localhost'; 
$dbname = 'my_db'; 
$username = 'root'; 
$password = ''; 
try {
    // Create a new PDO instance
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Set PDO to throw exceptions on error
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // Display an error message if connection fails
    echo "Connection failed: " . $e->getMessage();
}
?>
