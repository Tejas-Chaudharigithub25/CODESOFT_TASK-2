<?php
  include '../db/db.php';
 session_start();
  if($_POST) {

    $username = $_POST['user'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM `users` WHERE `name` = '$username' AND `pass` = '$pass'";
    $result = mysqli_query($conn,$sql);

    
    if(mysqli_num_rows($result) == 1){
        $row=$result->fetch_assoc();
        $_SESSION['id']=$row['id'];
        $_SESSION['loggedin']= true ;
        $_SESSION['msg']='
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>SuccessFully!</strong> Sign-In Successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'; 
        
        header("location:../users/index.php");
        
    }else{
        $_SESSION['msg']=
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failed!</strong>User are not Found.<br>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        header("location:../log.php");
    }


    }
?>