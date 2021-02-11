<?php include "head.php";?>

<body class="d-flex h-100 text-center text-white bg-dark">

   <?php include "header.php";?>

        <main class="px-3">
            <h1>Chat-Anonymously</h1>
            <p class="lead">Chat anonymously with any one in the world without worrying about chat logs. Chat with your friends by creating specific
                rooms. <br> 
               
                <h3>join a room</h3>

            <form action="room.php" method="GET">
                <p class="lead"><input   type="text" name="roomname"></p>
                <p class="lead">
                    <button href="#" class="btn btn-lg btn-secondary fw-bold border-white bg-white" type="submit">Join</button>
                </p>
            </form>

                or

            <h3>Create a room</h3>
            
            <form action="create.php" method="POST">
                <p class="lead"><input   type="text" name="roomname"></p>
                <p class="lead">
                    <button href="#" class="btn btn-lg btn-secondary fw-bold border-white bg-white" type="submit">Create</button>
                </p>
            </form>
            </p>
                
            </p>
            
        </main>

        <footer class="mt-auto text-white-50">
             <p class="lead"><b>Talk Less Chat More....</b></p>
        </footer>
    </div>
   <?php
        require_once "foot.php";
    ?>
    

</body>

</html>