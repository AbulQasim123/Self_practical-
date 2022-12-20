<?php
    $delete_id = $_GET['id'];
    include 'connect.php';
    $query = "DELETE FROM `student` WHERE `Id`= '$delete_id' ";
    $result = mysqli_query($conn,$query) or die('Query failed');
    header('Location: index.php?delete');
    mysqli_close($conn);

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>