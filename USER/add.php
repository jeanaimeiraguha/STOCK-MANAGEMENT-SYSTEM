<?php

$conn=mysqli_connect('localhost','root','','Shirinyota');
if ($conn) {
    # code...
    echo "connected successfully";
}
else{
    echo "Connection failed";
}

if (isset($_POST['add'])) {
    # code...
    $User_Name=$_POST['User_Name'];
    $Password=$_POST['Password'];
    $insert=mysqli_query($conn, "INSERT INTO `User` VALUES('','$User_Name','$Password')");
    if ($insert) {
        # code...
        echo "User added successfully";
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
    Username    <input type="text" name="User_Name"> <br>
     Password   <input type="text" name="Password"> <br>
     <button name="add">Add New User</button>
    </form>
    
</body>
</html>