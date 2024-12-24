<?php
$conn=mysqli_connect('localhost','root','','shirinyota');
if ($conn) {
    # code...
    echo "connected successfully";
}
else{
    echo "Connection failed";
}
?>