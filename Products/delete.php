<?php
include('conn.php');
$Product_id=$_GET['Product_id'];
$delete=mysqli_query($conn, "DELETE FROM products WHERE Product_id='$Product_id'");
if ($delete) {
    # code...
    header('location:select.php');
    //echo "Product deleted";
}
else{
    echo "Product Not deleted";
}
?>