<?php
    include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap-4.0.0-dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-4.0.0-dist\jquery-ui-1.12.1\jquery-ui.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Edit Record</h3>
                <?php
                    $edit_id = $_GET['id'];
                    include 'connect.php';
                    $query = "SELECT * FROM `student` WHERE `Id`= '$edit_id' ";
                    $result = mysqli_query($conn,$query);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row= mysqli_fetch_assoc($result)) {
                    
                ?>
                <div id="form_div">
                    <form action="updatedata.php" method="post">
                        <div class="form-group">
                            <label for="name" class="font-weight-bold">Name</label>
                            <input type="hidden" name="std_id" id='std_id' value="<?php echo $row['Id']; ?>">
                            <input type="text" name="std_name" id='std_name' value="<?php echo $row['Name']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="address" class="font-weight-bold">Address</label>
                            <input type="text" name="std_address" id="std_address" value="<?php echo $row['Address']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="class" class="font-weight-bold">Class</label>
                            <select name="std_class" id="std_class" class='form-control'>
                                <option value=""><?php echo  $row["Class"] ?></option>
                                <option value="BCA">BCA</option>
                                <option value="MCA">MCA</option>
                                <option value="BBA">BBA</option>
                                <option value="MBA">MBA</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="font-weight-bold">Phone</label>
                            <input type="text" name="std_phone" id="std_phone" value="<?php echo $row['Phone']; ?>" class="form-control">
                        </div>
                        <button type="submit" id="update_btn" name="update_btn" class="btn btn-primary" style="width: 100px;">Update</button>
                    </form>
                </div>
                <?php   
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    <script src="bootstrap-4.0.0-dist\js\myjquery.js"></script>
    <script src="bootstrap-4.0.0-dist\js\bootstrap.min.js"></script>
    <script src="bootstrap-4.0.0-dist\jquery-ui-1.12.1\jquery-ui.js"></script>
</body>
</html>