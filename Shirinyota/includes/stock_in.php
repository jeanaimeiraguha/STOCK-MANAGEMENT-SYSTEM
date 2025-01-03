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
    $quantity = $_POST['quantity'];

    if ($quantity > 0 && !empty($product_name)) {
        // Insert the new stock-in record into the database
        $sql = "INSERT INTO stock (product_name, quantity, transaction_type,`date`) 
                VALUES ('$product_name', '$quantity', 'in','$date')";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock In</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #1e90ff, #00bfff);
            color: white;
        }
        nav {
            background: rgba(0, 0, 0, 0.8);
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }
        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-size: 18px;
            transition: color 0.3s;
        }
        nav a:hover {
            color: aqua;
        }
        h2 {
            text-align: center;
            margin-top: 50px;
            font-size: 2.5rem;
        }
        form {
            background: rgba(0, 0, 0, 0.6);
            padding: 20px;
            margin: 20px auto;
            border-radius: 10px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-size: 18px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #00bfff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }
        button:hover {
            background-color: #1e90ff;
            transform: scale(1.05);
        }
        p {
            text-align: center;
            margin-top: 10px;
            font-size: 18px;
        }
        footer {
            background: rgba(0, 0, 0, 0.8);
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <nav>
        <div>
            <a href="index.php"><i class="fas fa-home"></i> Home</a>
            <a href="stock_status.php"><i class="fas fa-box"></i> Stock Status</a>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </nav>

    <h2>Record Stock In</h2>

    <form method="POST">
        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name" required>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required>
        <input type="date" id="date" name="date" required>

        <button type="submit"><i class="fas fa-plus-circle"></i> Record Stock In</button>
    </form>

    <?php if (isset($message)): ?>
        <p><?= $message; ?></p>
    <?php endif; ?>

    <footer>
        &copy; <?= date("Y"); ?> SHIRINYOTA Stock Management. All Rights Reserved.
    </footer>
</body>
</html>
