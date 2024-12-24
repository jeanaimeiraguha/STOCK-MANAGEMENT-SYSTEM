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
//include( 'includes/db.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Set headers for the CSV file
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="stock_data.csv"');

// Open a file to write the CSV data
$output = fopen('php://output', 'w');

// Write the column headers
fputcsv($output, ['Product Name', 'Quantity', 'Transaction Type', 'Transaction Date']);

// Fetch all stock records from the database
$sql = "SELECT product_name, quantity, transaction_type, transaction_date FROM stock";
$result = $conn->query($sql);

// Write each stock record as a row in the CSV
while ($row = $result->fetch_assoc()) {
    fputcsv($output, $row);
}

// Close the CSV file
fclose($output);
exit();
?>
