<?php
session_start();  // Start the session

// Destroy the session and all session data
session_unset();   // Remove all session variables
session_destroy(); // Destroy the session

// Redirect the user to the login page or home page after logout
header('Location: ./login.php'); // Adjust this if you want to redirect to a different page
exit;
?>
