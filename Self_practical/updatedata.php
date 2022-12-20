<?php
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $std_id = $_POST['std_id'];
        $std_name = $_POST['std_name'];
        $std_address = $_POST['std_address'];
        $std_class = $_POST['std_class'];
        $std_phone = $_POST['std_phone'];
        include 'connect.php';
        
        $query =" UPDATE `student` SET `Name`='$std_name', `Address`='$std_address',`Class`='$std_class',       
        `Phone`= '$std_phone' WHERE `student`.`Id` = '$std_id'" ;
        $result = mysqli_query($conn,$query) or die('Query failed');
        header('Location: index.php?update');
        mysqli_close($conn);
    }
    
?>
