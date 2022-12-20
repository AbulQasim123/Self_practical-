<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include 'connect.php';
        $name = $_POST['name'];
        $address = $_POST['address'];
        $class = $_POST['class'];
        $phone = $_POST['phone'];
        // echo $name . $address . $class . $phone;
       
        if (!empty($name and $address and $class and $phone)) {
            $query = " INSERT INTO `student` (`Name`,`Address`,`Class`,`Phone`) values('$name', '$address', '$class', '$phone') ";
            $result =  mysqli_query($conn,$query);
            if ($result) {
                header('Location: index.php?ok');
            }
            mysqli_close($conn);
        }else{
            header('Location: insert.php?Empty');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    
</body>
</html>