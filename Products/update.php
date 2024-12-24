<?php
//include('conn.php');  // Connect to the database

$conn=mysqli_connect('localhost','root','','shirinyota ');

if ($conn) {
    echo "connected";
    # code...
}

// Check if 'Product_id' is provided in the URL
if (isset($_GET['Product_id'])) {
    $Product_id = $_GET['Product_id'];  // Get the Product_id from the URL
    
    // Query to fetch the product details based on the Product_id
    $select = mysqli_query($conn, "SELECT * FROM products WHERE Product_id='$Product_id'");
    $row = mysqli_fetch_array($select);  // Fetch the result as an associative array
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
</head>
<body>
    <form action="" method="post">
        Product Id: <input type="text" name="Product_id" value="<?php echo $row['Product_id']; ?>"> <br>
        Product Name: <input type="text" name="Product_Name" value="<?php echo $row['Product_name']; ?>"> <br>
        <button type="submit" name="update">Update Product</button>
    </form>

    <?php
    // Check if the form is submitted
    if (isset($_POST['update'])) {
        // Get the updated product name from the form
        $Product_id = $_POST['Product_id'];  
        $Product_Name = $_POST['Product_Name'];

        // Update the product details in the database
        $update_query = "UPDATE products SET Product_name='$Product_Name' WHERE Product_id='$Product_id'";

        // Run the update query
        if (mysqli_query($conn, $update_query)) {
            // If successful, redirect to the products list page
            header('Location: select.php');
            exit();  // Stop executing further code after redirect
        } else {
            // If the update fails, show an error message
            echo "Failed to update product.";
        }
    }
    ?>
</body>
</html>
