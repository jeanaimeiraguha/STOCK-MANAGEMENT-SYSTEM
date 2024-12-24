<?php
session_start();
require_once 'includes/db.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to login if not logged in
    exit();
}

// Fetch stock status from the database
$sql = "SELECT product_name, SUM(CASE WHEN transaction_type = 'in' THEN quantity ELSE -quantity END) AS stock_quantity
        FROM stock
        GROUP BY product_name";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stock Status</title>
</head>
<body>
    <h2>Stock Status</h2>
    <table border="1">
        <tr>
            <th>Product Name</th>
            <th>Quantity</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo htmlspecialchars($row['product_name']); ?></td>
            <td><?php echo $row['stock_quantity']; ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
