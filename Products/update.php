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
        
    </form>
</body>
</html>



<?php



$update=mysqli_query($conn, "UPDATE products SET Product_id='$Product_id',Product_name='$Product_id' WHERE Product_id='$Product_id'");

?>