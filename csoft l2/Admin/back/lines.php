<?php
session_start();
include '../../db/db.php';

if($_POST) {

    $name = $conn->escape_string($_POST['name']);
    $seat = $conn->escape_string($_POST['seat']);
    $eco = $conn->escape_string($_POST['eco']);
    $buss = $conn->escape_string($_POST['buss']);

    $sql = "INSERT INTO alines (id, name, seats, buss, eco) VALUES (NULL, '$name','$seat','$buss','$eco')";
    $result = $conn->query($sql);
    if ($result) {

        $_SESSION['msg'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>successfully!</strong>Airline Data Inserted Successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        header('location: ../Airlines.php');
    } else {
        $_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failed!</strong>Something went wrong!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        header('location: ../Airlines.php');
    }

}

if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sqld="DELETE FROM alines WHERE id='$id'";
        $row=mysqli_query($conn,$sqld);
        if($row){
        $_SESSION['msg']=
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Succesfully!</strong>Data Deleted Succesfully.<br>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        header("location:../Airlines.php");
        }
    }
?>