<?php
    include "DB_connect.php";

    $msg = $_POST['text'];
    $roomName = $_POST['room'];
    $ip = $_POST['ip'];

    $sql = "INSERT INTO `messages` (`msg`, `roomname`, `ip`, `stime`) VALUES ('".$msg."', '".$roomName."', '".$ip."', CURRENT_TIMESTAMP);";
    mysqli_query($con,$sql);
    mysqli_close($con);
?>