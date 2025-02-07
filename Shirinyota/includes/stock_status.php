<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shirinyota"; // The name of the database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // If connection fails, show an error
}

session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to login if not logged in
    exit();
}

// Fetch stock status from the database, including the date of the latest transaction
$sql = "SELECT product_name, 
               SUM(CASE WHEN transaction_type = 'in' THEN quantity ELSE -quantity END) AS stock_quantity,
               MAX(transaction_date) AS date
        FROM stock
        GROUP BY product_name";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Status</title>
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
            margin-top: 30px;
            font-size: 2.5rem;
        }
        table {
            margin: 20px auto;
            width: 90%;
            max-width: 800px;
            border-collapse: collapse;
            background: white;
            color: black;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            padding: 15px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background: #1e90ff;
            color: white;
        }
        tr:nth-child(even) {
            background: #f2f2f2;
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
            <a href="stock_in.php"><i class="fas fa-plus-circle"></i> Stock In</a>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </nav>

    <h2>Stock Status</h2>

    <table>
        <tr>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Date</th>
        </tr>
        <?php 
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['product_name']); ?></td>
                <td><?= $row['stock_quantity']; ?></td>
                <td><?= htmlspecialchars($row['date'] ?? 'N/A'); ?></td>
            </tr>
        <?php 
            endwhile; 
        } else { ?>
            <tr>
                <td colspan="3">No stock data available</td>
            </tr>
        <?php } ?>
    </table>

    <footer>
        &copy; <?= date("Y"); ?> SHIRINYOTA Stock Management. All Rights Reserved.
    </footer>
</body>
</html>
