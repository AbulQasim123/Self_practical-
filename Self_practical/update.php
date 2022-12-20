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
                <h3>Update Record</h3>
                <div class="" id="form_div">
                    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                        <div class="form-group">
                            <label for="update_id" class="font-weight-bold">Id</label>
                            <input type="text" name="update_id" id="update_id" class="form-control" placeholder="Enter Update Id">
                        </div>
                        <button type="submit" id="show_btn" name="show_btn" class="btn btn-primary" style="width: 100px">Show</button>
                    </form>
                    <?php 
                        if (isset($_POST['show_btn'])) {
                            include 'connect.php';
                            $update_id = $_POST['update_id'];
                            if (!empty($update_id)) {
                                $query = "SELECT * FROM `student` WHERE Id ='$update_id' ";
                                $result = mysqli_query($conn,$query);
                                if(mysqli_num_rows($result) > 0){
                                    while ($row= mysqli_fetch_assoc($result)) {
                                
                    ?>
                    <div class="my-4">
                        <form action="updatedata.php" method="post">
                            <div class="form-group">
                                <label for="std_id" class="font-weight-bold">Name</label>
                                <input type="hidden" name="std_id" id="std_id" value="<?php echo $row['Id'] ?>" class="form-control">
                                <input type="text" name="std_name" id="std_name" value="<?php echo $row['Name'] ?>" class="form-control"> 
                            </div>
                            <div class="form-group">
                                <label for="std_address" class="font-weight-bold">Address</label>
                                <input type="text" name="std_address" id="std_address" value="<?php echo $row['Address'] ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="std_class" class="font-weight-bold">Class</label>
                                <select name="std_class" id="std_class" class='form-control'>
                                    <option value=""><?php echo  $row["Class"] ?></option>
                                    <option value="BCA">BCA</option>
                                    <option value="MCA">MCA</option>
                                    <option value="BBA">BBA</option>
                                    <option value="MBA">MBA</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="std_phone" class="font-weight-bold">Phone</label>
                                <input type="text" name="std_phone" id="std_phone" value="<?php echo $row['Phone'] ?>" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary" id="update_btn" name="update_btn" style="width: 100px;">Update</button>
                        </form>
                    </div>
                    <?php 
                            }
                            }else{
                                echo "<div id='msg_dialog1' class='text-danger'><b>No Record found.</b><br>
                                    <button id='close_dialog1' class='btn btn-primary btn-sm float-right mr-3'>ok</button>
                                </div>";
                            }
                        }else{
                            echo "<div id='msg_dialog2' class='text-danger'><b>Please Enter Update Id.</b><br>
                            <button id='close_dialog2' class='btn btn-primary btn-sm float-right mr-3'>ok</button>
                            </div>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="bootstrap-4.0.0-dist\js\myjquery.js"></script>
    <script src="bootstrap-4.0.0-dist\js\bootstrap.min.js"></script>
    <script src="bootstrap-4.0.0-dist\jquery-ui-1.12.1\jquery-ui.js"></script>
    <script>
        $(document).ready(function () {
            $('#msg_dialog1').dialog({
                resizable: false,
                title: 'Error',
            });
            $('#msg_dialog2').dialog({
                resizable: false,
                title: 'Error',
            });
            $('#close_dialog1').click(function () {
                $('#msg_dialog1').dialog('close');
            })
            $('#close_dialog2').click(function () {
                $('#msg_dialog2').dialog('close');
            })
        })
        $(document).ready(function(){
            $('.close').on('click', function(){
                $('#error_hide').hide();
            })
        })
    </script>
</body>
</html>