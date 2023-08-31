<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web-Development</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <!-- <link rel="stylesheet" href="home.css"> -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container d-flex justify-content-center my-5">
        <div class="card shadow rounded p-4 w-50 ">
            <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
            <img class="m-auto" width="50px" src="alogo.png" alt="admin logo">
            <lable class="text-center h3 my-2" style="color:rgb(182, 95, 240);">Book my trip</lable>
            <label class="h5 text-center mt-2">Registered</label><br>
                <form action="backwork/signuser.php" method="post">
                
                <label for="">Username</label>
                <input class="form-control " placeholder="Create Username" type="text" name="user" required><br>
                <label for="">E-mail</label>
                <input class="form-control " placeholder="Enter E-mail" type="email" name="email" required><br>
                
                <label for="">Password</label>
                <input class="form-control" placeholder="Create Strong Password" type="password" name="pass" required><br>
                <div class="justify-content-center">
                    <button  class="btn btn-success" >Register</button>
                </div>
                </form>
                <br>
               <a href="log.php"><p class="text-primary">Sign-In, If Already have acconts</p></a>

        </div>
    </div>
</body>
</html>