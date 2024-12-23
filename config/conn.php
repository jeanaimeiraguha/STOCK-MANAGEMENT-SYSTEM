<?php
$conn=mysqli_connect('localhost','root','','Shirinyota');
if ($conn) {
    # code...
    echo "connected successfully";
}
else{
    echo "Connection failed";
}
?>