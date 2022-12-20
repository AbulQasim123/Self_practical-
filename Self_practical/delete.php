<?php
    include 'header.php';
    if (isset($_POST['delete_btn'])) {
        include 'connect.php';
        $delete_id = $_POST['delete_id'];
        if (!empty($delete_id)) {
            $query1 = "SELECT * FROM `student` WHERE Id= '$delete_id' ";
            $result1 = mysqli_query($conn,$query1);
            if(mysqli_num_rows($result1) > 0){
                $query2 = "DELETE FROM `student` WHERE Id = '$delete_id' ";
                $result2 = mysqli_query($conn,$query2);
                header('Location: index.php?correct');
            }else{
                header('Location: delete.php?Error');
            }
        }else{
            echo "<div id='Error_msg' class='font-weight-bold text-danger'>Please enter delete Id.
                <button type='button' class='close_btn btn btn-primary btn-sm float-right my-3 mr-4'>ok</button>
            </div>";
        }
        mysqli_close($conn);
        
    }

    $show_error = false;
    if (isset($_REQUEST['Error'])) {
        $show_error = true;
    }
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
    <style>
        #error_hide{
            background-color: #54555c;
            color: white;
            padding: 15px;
            margin: 10px;
            /* display: none; */
            position: absolute;
            right: -5px;
            top: 45px;
        }
    </style>
</head>
<body>
    <?php
        if ($show_error) {
            echo "<div id='error_hide' class='font-weight-bold'>
                <b>Error: </b>Record Not found.
                <button class='close text-white'>&times;</button>
            </div>";
        }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Delete Record.</h3>
                <div id="form_div">
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                        <div class="form-group">
                            <label for="delete_id" class="font-weight-bold">Id</label>
                            <input type="text" name="delete_id" id="delete_id" class="form-control" placeholder="Enter Delete Id">
                        </div>
                        <button type="submit" id="delete_btn" name="delete_btn" class="btn btn-primary" style="width: 100px;">Delete</button>
                    </form>
                </div> 
            </div>
        </div>
    </div>
    <script src="bootstrap-4.0.0-dist\js\myjquery.js"></script>
    <script src="bootstrap-4.0.0-dist\js\bootstrap.min.js"></script>
    <script src="bootstrap-4.0.0-dist\jquery-ui-1.12.1\jquery-ui.js"></script>
    <script>
        $(document).ready(function(){
            $('.close').on('click', function(){
                $('#error_hide').hide();
            })
            $('#Error_msg').dialog({
                title: 'Error',
                resizable: false,
            })
            $('#close_btn').click(function() {
                $('#Error_msg').hide();
            })
        })
    </script>
</body>
</html>