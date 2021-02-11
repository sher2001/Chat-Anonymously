<?php
    // getting information from get method
    $roomName = $_GET['roomname'];
    
    //connecting to database
    include "DB_connect.php"; 

    // Execute sql to chect whether room exist or not
    $sql = "SELECT * FROM `rooms` WHERE roomname = '".$roomName."'";
    $result = mysqli_query($con,$sql);
    if($result){
        // check if room exists...
        if(mysqli_num_rows($result)==0){
            $message = "This room doesn't exist";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location = "http://localhost/Chat-Anonymously";';
            echo '</script>';
        }
    } else{
        die(mysqli_error($con));
    }

    // echo "Let's chat now";
    
?>

<!-- html code -->
<?php include "head.php"?>


<body class="d-flex h-100 text-white bg-dark">
<?php include "header.php";?>
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <div>
            <header class="mb-auto">
            
                <h4 class="float-md-start mb-0">Chat Room - <u style="color: bisque;"><?php echo $roomName;?></u></h4>
                
            </header>
        </div>
        <main class="px-3">

            <div class="container">
                <!-- <img src="/w3images/bandmember.jpg" alt="Avatar" style="width:100%; height:10%;"> -->
                <div class="anyClass">
                    
                </div>
            </div>

            
        
            <!-- <form action="create.php" method="post"> -->
                <p class="lead">
                    <input type="text" class="form form-control text-white" name="usermsg" id="usermsg" placeholder="Type your message" style="  background: none;">
                </p>
                <p class="lead">
                    <button class="btn btn-lg btn-secondary fw-bold border-white bg-white" id="submit" type="submit" name="submit">Send</button>
                </p>
            <!-- </form> -->
        </main>
        
        <footer class="mt-auto text-center text-white-50">
             <p class="lead"><b>Talk Less Chat More....</b></p>
        </footer>
    </div>

    <?php include "foot.php";?>
    
    <script>
        // check for new msg for every 1 second
        setInterval(runFunction, 1000);
        function runFunction() {
            $.post("htcont.php", {room: "<?php echo $roomName ;?>"}, 
            function (data,status) {
                document.getElementsByClassName('anyClass')[0].innerHTML = data;
            });
        }
    //    using enter to submit
        var input = document.getElementById("usermsg");        
        input.addEventListener("keyup", function(event) {
        // Number 13 is the "Enter" key on the keyboard
        if (event.keyCode === 13) {
            // Cancel the default action, if needed
            event.preventDefault();
            document.getElementById("submit").click();
        }
        });

        // if user clicks submit we have to add the message chat
        $("#submit").click(function(){
            var clientmsg = $("#usermsg").val();
            $.post("postmsg.php", {text: clientmsg, room: "<?php echo $roomName ;?>", ip: "<?php echo $_SERVER['REMOTE_ADDR'] ;?> "},function(data, status){
                document.getElementsByClassName('anyClass')[0].innerHTML = data;
                // alert("Data: " + data + "\nStatus: " + status);
            });
                $("#usermsg").val("");
        });
    </script>
</body>
</html>
