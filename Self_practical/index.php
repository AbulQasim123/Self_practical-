<?php 
    $show_alert1 = false;
    $show_alert2 = false;
    $show_alert3 = false;
    $show_alert4 = false;
    $show_alert5 = false;
    include 'header.php';
    if (isset($_REQUEST['ok'])) {
        // echo 'Data save successfully';
        $show_alert1 = true;
    }
    if (isset($_REQUEST['correct'])) {
        $show_alert2 = true;
    }
    if (isset($_REQUEST['update'])) {
        $show_alert3 = true;
    }
    if (isset($_REQUEST['updateErr'])) {
        $show_alert4 = true;
    }
    if (isset($_REQUEST['delete'])) {
        $show_alert5 = true;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap-4.0.0-dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-4.0.0-dist\jquery-ui-1.12.1\jquery-ui.css">
    <style>
        #success_hideone{
            background: #dec1d8;
            color: green;
            padding: 10px;
            margin: 10px;
            /* display: none; */
            position: absolute;
            right: -5px;
            top: 45px;
        }
        #success_hidetwo{
            background: #7fd38d;
            color: black;
            padding: 15px;
            margin: 10px;
            /* display: none; */
            position: absolute;
            right: -5px;
            top: 45px;
        }
        /* #success_hidethree{
            background: #dec1d8;
            color: green;
            padding: 10px;
            margin: 10px;
            display: none;
            position: absolute;
            right: -5px;
            top: 45px;
        } */
        
    </style>
</head>
<body>
    <?php 
        if ($show_alert1) {
            echo "<div id='success_hideone' class='font-weight-bold'>
                <b>Success: </b>Data save successfully.
                <button class='close text-black'>&times;</button>
            </div>";
        }
        if ($show_alert2) {
            echo "<div id='success_hidetwo' class='font-weight-bold'>
                <b>Success: </b>Record delete successfully.
                <button class='close text-black'>&times;</button>
            </div>";
        }
        if ($show_alert3) {
            echo "<div id='success_dialog' class='font-weight-bold text-success'>
                <b>Success: </b>Record update successfully.
                <button id='success_btn' class='btn btn-secondary btn-sm float-right'>ok</button>
            </div>";
        }
        if ($show_alert4) {
            echo "<div id='Error_one' class='font-weight-bold text-danger' style='display: none;'>
                <b>Error: </b>Something went wrong.
                <button id='close_dialog' class='btn btn-primary btn-sm float-right mr-3'>ok</button>
            </div>";
        }
        if ($show_alert5) {
            echo "<div id='success_hidefour' class='font-weight-bold text-success' style='display: none;'>
                <b>Success: </b>Record delete successfully.
                <button id='close_dialog' class='btn btn-primary btn-sm float-right mr-3'>ok</button>
            </div>";
        }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>All Record</h3>
                <?php 
                    include 'connect.php';
                    $query = "SELECT * FROM `student` ";
                    $result = mysqli_query($conn,$query);
                    if (mysqli_num_rows($result) > 0) {
                ?>
                <div id="">
                    <table class="table table-bordered table-hover table-sm text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Class</th>
                                <th>Phone</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                while ($rows = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $rows['Id']; ?></td>
                                <td><?php echo $rows['Name']; ?></td>
                                <td><?php echo $rows['Address']; ?></td>
                                <td><?php echo $rows['Class']; ?></td>
                                <td><?php echo $rows['Phone']; ?></td>
                                <td><a href="edit.php?id= <?php echo $rows['Id']; ?>" class="btn btn-info btn-sm">Edit</a></td>
                                <td><a href="delete-inline.php?id= <?php echo $rows['Id']; ?>" class="btn btn-danger btn-sm">Delete</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <?php }else{ echo "<h3>NO Record found.</h3>";}?>
            </div>
        </div>
    </div>
    <script src="bootstrap-4.0.0-dist\js\myjquery.js"></script>
    <script src="bootstrap-4.0.0-dist\js\bootstrap.min.js"></script>
    <script src="bootstrap-4.0.0-dist\jquery-ui-1.12.1\jquery-ui.js"></script>
    <script>
            $(document).ready(function () {
                $('.close').on('click', function(){
                    $('#success_hideone').hide();
                    $('#success_hidetwo').hide();
                    $('#success_hidethree').hide();
                })
                // $('#Error_one').dialog({
                //     resizable: false,
                // })
                $('#success_dialog').dialog({
                    resizable: false,
                    title: 'Success',
                })
                $('#success_btn').click(function() {
                    $('#success_dialog').dialog('close');
                })
                $('#success_hidefour').dialog({
                    resizable: false,
                });
                
                $('#close_dialog').click(function(){
                    // $('#Error_one').dialog('close');
                    $('#success_hidefour').dialog('close');
                })
            })
    </script>
</body>
</html>