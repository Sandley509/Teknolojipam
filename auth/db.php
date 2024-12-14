<?php
// Database credentials
$host = 'localhost';          // Database host (usually localhost)
$dbname = 'elearning_platform'; // Your database name
// $username = 'Sandley';           // Database username
// $password = 'Sawendjy1976@';               // Database password (empty for default localhost setup)
$username = 'root';           // Database username
$password = '';               // Database password (empty for default localhost setup)

try {
    // Create a new PDO instance and set error mode to exception
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // If connection fails, display the error message
    echo 'Connection failed: ' . $e->getMessage();
    exit;
}
?>
