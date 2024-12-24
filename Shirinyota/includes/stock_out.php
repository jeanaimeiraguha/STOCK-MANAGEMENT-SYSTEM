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


session_start();
//require_once 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect if not logged in
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name = $_POST['product_name'];
    $quantity = $_POST['quantity'];

    if ($quantity > 0 && !empty($product_name)) {
        // Insert the stock-out record into the database
        $sql = "INSERT INTO stock (product_name, quantity, transaction_type) 
                VALUES ('$product_name', '$quantity', 'out')";
        if ($conn->query($sql) === TRUE) {
            $message = "Stock-out recorded successfully!";
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
    <title>Stock Out</title>
</head>
<body>
    <h2>Stock Out</h2>
    <form method="POST">
        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name" required><br>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required><br>

        <button type="submit">Record Stock-out</button>
    </form>

    <?php if (isset($message)) { echo "<p>$message</p>"; } ?>
</body>
</html>
