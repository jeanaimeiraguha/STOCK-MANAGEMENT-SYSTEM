<?php

$conn=mysqli_connect('localhost','root','','Shirinyota');

if (isset($_POST['add'])) {
    # code...
    $Product_id=$_POST['Product_id'];
    $Product_Name=$_POST['Product_Name'];
    $insert=mysqli_query($conn, "INSERT INTO products VALUES('$Product_id','$Product_Name')");
    if ($insert) {
        # code...
        header('location:select.php');
        //echo "Product added successfully";
    }
    else{
        echo "failed";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
    Product Id  <input type="text" name="Product_id"> <br>
     Product Name   <input type="text" name="Product_Name"> <br>
     <button name="add">Add New Product</button>
    </form>
    
</body>
</html>