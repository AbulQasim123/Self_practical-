<?php
    $show_error = false;
    include 'header.php'; 
    
    if (isset($_REQUEST['Empty'])) {
        // echo "Please fill out of these field";
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
                <b>Error: </b>Please fill out of these field.
                <button class='close text-white'>&times;</button>
            </div>";
        }
    ?>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="my-1">Add new Record.</h3>
                <div id="form_div">
                    <form action="save.php" method="post">
                        <div class="form-group">
                            <label for="name" class="font-weight-bold">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="address" class="font-weight-bold">Address</label>
                            <input type="text" name="address" id="address" class="form-control" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <label for="class" class="font-weight-bold">Class</label>
                            <select name="class" id="class" class="form-control">
                                <option value="" selected disabled>Select Class</option>
                                <option value="BCA">BCA</option>
                                <option value="MCA">MCA</option>
                                <option value="BBA">BBA</option>
                                <option value="MBA">MBA</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="font-weight-bold">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone">
                        </div>
                        <button type="submit" class="btn btn-primary" id="save" name="save" style="width: 100px;">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="bootstrap-4.0.0-dist\js\myjquery.js"></script>
    <script src="bootstrap-4.0.0-dist\js\bootstrap.min.js"></script>
    <script>
            $(document).ready(function () {
                setTimeout(() => {
                        $('#error_hide').fadeOut('slow');
                }, 5000);
                $('.close').on('click', function(){
                    $('#error_hide').hide();
                })
            })
    </script>
</body>
</html>