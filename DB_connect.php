<?php
    // echo "DB Connected";
    $serverName = 'localhost';
    $userName = 'root';
    $password = '';
    $database = 'chatRoom';
    
    // creating connection to database
    $con = mysqli_connect($serverName, $userName, $password, $database) or die("Failed to connect".mysqli_connect_error()); 
?>