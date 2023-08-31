<?php
   session_start();
  include '../../db/db.php';

  if($_POST) {

    $name = $conn->escape_string($_POST['name']);

    $sql = "INSERT INTO `city` (`id`, `name`) VALUES (NULL, '$name')";
    $result = mysqli_query($conn,$sql);

    if($result){
       
        $_SESSION['msg']='
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>SuccessFully!</strong>'.$name .' City Inserted Successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'; 
        header("location:../Acity.php");
        
    }else{
        $_SESSION['msg']=
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failed!</strong>Failed to update.<br>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        header("location:../Acity.php");
    }


    }

    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sqld="DELETE FROM city WHERE id='$id'";
        $row=mysqli_query($conn,$sqld);
        if($row){
        $_SESSION['msg']=
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Successfully!</strong>City Dleted Successfully.<br>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        header("location:../Acity.php");
        }
    }
?>