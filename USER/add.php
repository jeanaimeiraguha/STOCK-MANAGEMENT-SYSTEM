<?php
include('config/conn.php');
if (isset($_POST['add'])) {
    # code...
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
    Username    <input type="text" name="User_Name,"> <br>
     Password   <input type="text" name="Password"> <br>
     <button name="add">Add New User</button>
    </form>
    
</body>
</html>