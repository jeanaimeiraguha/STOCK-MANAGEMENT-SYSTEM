<?php

$servername = "localhost";
$username = "root"; // Default MySQL username
$password = ""; // Default password is empty for XAMPP
$dbname = "shirinyota"; // The name of the database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // If connection fails, show an error
}


// Start the session to ensure the user is logged in
session_start();

// Include the database connection
require_once 'includes/db.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to login if the user is not logged in
    exit();
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get data from the form
    $product_name = $_POST['product_name'];
    $quantity = $_POST['quantity'];

    if ($quantity > 0 && !empty($product_name)) {
        // Insert the new stock-in record into the database
        $sql = "INSERT INTO stock (product_name, quantity, transaction_type) 
                VALUES ('$product_name', '$quantity', 'in')";
        if ($conn->query($sql) === TRUE) {
            $message = "Stock-in recorded successfully!";
        } else {
            $message = "Error: " . $conn->error;
        }
    } else {
        $message = "Please enter valid data.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stock In</title>
</head>
<body>
    <h2>Stock In</h2>
    <form method="POST">
        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name" required><br>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required><br>

        <button type="submit">Record Stock-in</button>
    </form>

    <?php if (isset($message)) { echo "<p>$message</p>"; } ?>
</body>
</html>
