<?php
include('conn.php');
$select=mysqli_query($conn, "SELECT * FROM products");
while($row=mysqli_fetch_array($select)){
?>
