<?php 
    $server_name = 'localhost';
    $user_name= 'root';
    $pass_word= '';
    $data_base= 'php_project';
    
    $conn= mysqli_connect($server_name, $user_name, $pass_word,$data_base);

    if (!$conn) {
        die('connection successfull');
    }
    // else{
    //     echo 'connection successfull';
    // }
?>