<?php
include('conn.php');
$select=mysqli_query($conn, "SELECT * FROM products");
while($row=mysqli_fetch_array($select)){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Product Id</th>
            <th>Product Name</th>
            <th colspan="2">Operations</th>
        </tr>
        <tr>
            <td><?php echo $row['Product_id']?></td>
            <td><?php echo $row['Product_Name']?></td>
            <td><a href="delete.php?Product_id=<?php echo $row['Product_id']?>">Delete</a></td>
            <td><a href="update.php?Product_id=<?php echo $row['Product_id']?>">Update</a></td>
        </tr>
        <?php
        }?>
    </table>

</body>
</html>