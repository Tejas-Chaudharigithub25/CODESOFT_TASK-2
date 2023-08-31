<?php
  include '../../db/db.php';
 session_start();
  if($_POST) {
    $_SESSION['adminlog']=false;

    $username = $_POST['user'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM `admin` WHERE `name` = '$username' AND `pass` = '$pass'";
    $result = mysqli_query($conn,$sql);

    
    if(mysqli_num_rows($result) == 1){
        $row=$result->fetch_assoc();

        $_SESSION['adminlog']= true ;
        $_SESSION['msg']='
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>SuccessFully!</strong> Sign-In Successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'; 
        
        header("location:../index.php");
        
    }else{
        $_SESSION['msg']=
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failed!</strong>User are not Found.<br>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        header("location:../signin.php");
    }


    }
?>