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
        <div class="card shadow rounded p-4 my-5 w-50 ">
            <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
            <img class="m-auto" width="50px" src="alogo.png" alt="admin logo">
            <lable class="text-center h3 my-2" style="color:rgb(182, 95, 240);">Book my trip</lable>
            <label class="h5 text-center mt-2">Sign-In</label><br>
                <form action="backwork/loguser.php" method="post">
                <input hidden type="text" name="id" >
                <label for="">Username</label>
                <input class="form-control " placeholder="Enter Username" type="text" name="user"required><br>
                <label for="">Password</label>
                <input class="form-control" placeholder="Enter Password" type="password" name="pass"required><br>
                
                <button  class="btn btn-success" >Sign-In</button>
                
                </form>
<br>
               <a href="signup.php"><p class="text-primary">Register, New Account!</p></a>
                
            </div>
        </div>
    </div>
</body>
</html>