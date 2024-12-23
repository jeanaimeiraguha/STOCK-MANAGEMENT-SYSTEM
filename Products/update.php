<?php

$Product_id=$_GET['Product_id'];
$select=mysqli_query($conn,"SELECT * FROM products WHERE Product_id='$Product_id'");
$row=mysqli_fetch_array($select);

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
    Product Id  <input type="text" name="Product_id" value="<?php echo $row['Product_id']?>"> <br>
     Product Name   <input type="text" name="Product_Name" value="<?php $row['Product_name']?>"> <br>
     <button name="add">Add New Product</button>
    </form>
    <?php
if (isset($_POST['add'])) {
    # code...
    $Product_id=$_POST['Product_id'];
    $Product_Name=$_POST['Product_Name'];
    $update=mysqli_query($conn, "UPDATE Products set Product_id='$Product_id','$Product_Name' WHERE Product_id='$Product_id'");
    if ($update) {
        # code...
        header('location:select.php');
        //echo "Product added successfully";
    }
    else{
        echo "failed";
    }
}
?>




?>