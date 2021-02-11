<?php
  include "DB_connect.php";

  $roomName = $_POST['room'];
  $sql = "SELECT msg, stime, ip FROM messages WHERE roomname ='$roomName';";
  $res = "";
  $result = mysqli_query($con,$sql);
  
  if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){
        $res = $res . '<div class="container">';
        $res = $res . $row['ip'];
        $res = $res . "says <p>".$row['msg'];
        $res = $res . '</p> <span class="time-right">'.$row['stime'];
        $res = $res . '</span></div>'; 
      }
  }else{
      die(mysqli_error($con));
  }
  echo $res;  
?>