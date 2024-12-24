<?php
// Start the session to check if the user is logged in
session_start();

// Check if the user is logged in by checking if session variable is set
if (isset($_SESSION['user_id'])) {
    // If logged in, show a welcome message and options
    echo "<h1>Welcome to SHIRINYOTA Stock Management!</h1>";
    echo "<p>Hello, " . $_SESSION['user_id'] . "!</p>";
    echo "<p><a href='stock_status.php'>View Stock Status</a></p>";
    echo "<p><a href='stock_in.php'>Record Stock In</a></p>";
    echo "<p><a href='stock_out.php'>Record Stock Out</a></p>";
    echo "<p><a href='logout.php'>Logout</a></p>"; // Link to logout (you'll need to create this file)
} else {
    // If not logged in, redirect to the login page
    header('Location: login.php');
    exit();
}
?>
