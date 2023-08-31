<?php
session_start();
include '../../db/db.php';

if($_POST) {

    $aname = $conn->escape_string($_POST['aname']);
    $arrive = $conn->escape_string($_POST['come']);
    $depart = $conn->escape_string($_POST['go']);
    $name = $conn->escape_string($_POST['aname']);
    $ddate = $conn->escape_string($_POST['gtime']);
    $adate = $conn->escape_string($_POST['ctime']);

    $sqla = "SELECT * FROM alines WHERE name = '$name'";
    $resulta = mysqli_query($conn,$sqla);
    $rowa = mysqli_fetch_assoc($resulta);
    $seats = $rowa['seats'];

    $price = $conn->escape_string($_POST['price']);

    $sql = "INSERT INTO flight (`id`, `alines`, `cfrom`, `gfrom`, `depart`, `arrive`, `seats`, `rs`) VALUES (NULL, '$name', '$arrive', '$depart', '$ddate', '$adate', '$seats', '$price')";
    $result = mysqli_query($conn,$sql);

    if($result){
       
        $_SESSION['msg']='
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>SuccessFully!</strong> Flight Data Inserted Successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        header("location:../Aflight.php");
        
    }else{
        $_SESSION['msg']=
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failed!</strong>Failed to Insert Data.<br>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        header("location:../Aflight.php");
    }


    }


if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sqld="DELETE FROM flight WHERE id='$id'";
        $row=mysqli_query($conn,$sqld);
        if($row){
        $_SESSION['msg']=
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Successfully!</strong>Data Deleted Successfully.<br>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        $_SESSION['citya']="active show";
        header("location:../Aflight.php");
        }
    }
?>