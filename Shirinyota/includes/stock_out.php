<?php

$servername = "localhost";
$username = "root"; 
$password = ""; // Default password is empty for XAMPP
$dbname = "shirinyota"; // The name of the database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // If connection fails, show an error
}

session_start();

// Redirect to login page if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name = $_POST['product_name'];
    $quantity = $_POST['quantity'];

    if ($quantity > 0 && !empty($product_name)) {
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Out</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #ff7f50, #ff4500);
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
            margin-top: 30px;
            font-size: 2.5rem;
        }
        form {
            max-width: 500px;
            margin: 30px auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            color: black;
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
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            background: #ff4500;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        button:hover {
            background: #ff6347;
        }
        .message {
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
            color: #ff4500;
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

    <h2>Stock Out</h2>

    <form method="POST">
        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name" required>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required>

        <button type="submit"><i class="fas fa-minus-circle"></i> Record Stock-out</button>
    </form>

    <?php if (isset($message)): ?>
        <p class="message"><?= htmlspecialchars($message); ?></p>
    <?php endif; ?>

    <footer>
        &copy; <?= date("Y"); ?> SHIRINYOTA Stock Management. All Rights Reserved.
    </footer>
</body>
</html>
