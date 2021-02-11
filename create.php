<?php


    $roomName = $_POST['roomname'];
    // echo "$roomName";
    
    function alert($msg){
        echo '<script language="javascript">';
       echo 'alert("'.$msg.'");';
       echo 'window.location = "http://localhost/Chat-Anonymously";';
       echo '</script>';
   }

    if(strlen($roomName)<2 or strlen($roomName)>20){
        $message = "please enter the room name between 2 and 20 digits.";
        alert($message);
        
    }else if(!ctype_alnum($roomName)){
        $message = "please enter the room name with alpha numerals.";
        alert($message);

    }else{
        // conneet to database
        include "DB_connect.php";
         
    }
    
    $query = "SELECT * FROM `rooms` WHERE roomname = '$roomName' ";
    $result = mysqli_query($con,$query);
    if($result){
        if(mysqli_num_rows($result)>0){
            $message = "This room with this name is already existed, please choose another name ";
            alert($message);  
        }else{
            $sql = "INSERT INTO `rooms` (`roomname`, `stime`) VALUES ('$roomName', CURRENT_TIMESTAMP);";
            $res = mysqli_query($con,$sql);
            if($res){
                $message = "Your room is created sucessfully, You can chat now";
                echo '<script language="javascript">';
                echo 'alert("'.$message.'");';
                echo 'window.location = "http://localhost/Chat-Anonymously/room.php?roomname='.$roomName.'";';
                echo '</script>';
            } else{ die(mysqli_error($con)); }
        }
    } else{die("Error: ".mysqli_error($con));}
?>
