<?php
// $servername = "localhost";
// $username = "root"; // Default MySQL username
// $password = ""; // Default password is empty for XAMPP
// $dbname = "shirinyota"; // The name of the database

// Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error); // If connection fails, show an error
// }



// // Start the session to check if the user is logged in
// session_start();

// // Check if the user is logged in by checking if session variable is set
// if (isset($_SESSION['user_id'])) {
//     // If logged in, show a welcome message and options
//     echo "<h1>Welcome to SHIRINYOTA Stock Management!</h1>";
//     echo "<p>Hello, " . $_SESSION['user_id'] . "!</p>";
//     echo "<p><a href='stock_status.php'>View Stock Status</a></p>";
//     echo "<p><a href='stock_in.php'>Record Stock In</a></p>";
//     echo "<p><a href='stock_out.php'>Record Stock Out</a></p>";
//     echo "<p><a href='logout.php'>Logout</a></p>"; // Link to logout (you'll need to create this file)
// } else {
//     // If not logged in, redirect to the login page
//     header('Location: login.php');
//     exit();
// }
//?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        h2{
            text-align: center;
            margin-top: 270px;
            color: white;
            font: 2rem;
        }
        nav{
            color: white;
            float: right;
            margin-top: -230px;
        }
        a{
            color: black;
            outline: none;
            font-size: 20px;
            padding: 25px;
            text-decoration:none ;
            
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: aqua;">
    <nav>
        <a href="">Home</a>
        <a href="">Contact Us</a>
        <a href="">Services</a>
        <a href="">Login</a>
    </nav>
   <h2>WELCOME TO SHIRINYOTA STOCK</h2> 
</body>
</html>
