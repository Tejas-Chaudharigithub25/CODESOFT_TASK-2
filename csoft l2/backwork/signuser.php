<?php
  include '../db/db.php';
session_start();
  if($_POST) {

      $username = $_POST['user'];
      $email = $_POST['email'];
      $pass = $_POST['pass'];

    $sql = "SELECT * FROM `users` WHERE `name` = '$username' OR `email` = '$email' OR `pass` = '$pass'";
    $result = $conn->query($sql);

    if($result->num_rows >0){
        $_SESSION['msg']='
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <b>Alert!</b>             
        <span class="text-danger">User Already Exists.</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div >';
        header("location:../signup.php");
    }else{

      $sql1 = "INSERT INTO `users` (`id`, `name`, `email`, `pass`) VALUES (NULL, '$username', '$email', '$pass')";
      $result1 = $conn->query($sql1);

      if($result1){
          $_SESSION['msg']='
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> You should check in on some of those fields below.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
            header("location:../index.php");
      }else{
          $_SESSION['msg']='
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> You should check in on some of those fields below.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
            header("location:../signup.php");
      }
    }


    }
?>