<?php
   session_start();
  include '../../db/db.php';

  if($_POST) {

    $username = $conn->escape_string($_POST['name']);
    $mail = $conn->escape_string($_POST['mail']);
    $pass = $conn->escape_string($_POST['pass']);

    $sqls = "SELECT * FROM admin WHERE name='$username'";
    $results = mysqli_query($conn,$sqls);

    if($results->num_rows==1){

    $sql = "UPDATE admin SET email='$mail',pass='$pass' WHERE name='$username'";
    $result = mysqli_query($conn,$sql);

    if($result){
       
        $_SESSION['msg']='
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>SuccessFully!</strong> Profile Update Successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'; 
        
        header("location:../profile.php");
        
    }else{
        $_SESSION['msg']=
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failed!</strong>Failed to update.<br>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        header("location:../profile.php");
    }
 }else{
    $_SESSION['msg']=
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Sorry!</strong>Admin not exists.<br>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        header("location:../profile.php");
 }
    }


?>