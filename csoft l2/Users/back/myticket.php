<?php
include '../../db/db.php';
session_start();

if($_POST){
    
    $tid=$conn->escape_string($_POST['tid']);
    $from=$conn->escape_string($_GET['from']);
    $to=$conn->escape_string($_GET['to']);
    $alines=$conn->escape_string($_GET['al']);
    $class=$conn->escape_string($_GET['class']);
    $passe=$conn->escape_string($_GET['passe']);
    $rs=$conn->escape_string($_GET['rs'])/$passe;

    $sqlt='SELECT * FROM `travellers` WHERE `uid`='.$_SESSION['id'].'';
    $rest=$conn->query($sqlt);

    
    if($rest){
        foreach($rest as $row){
            $sql="INSERT INTO `tickets` (`uid`,`name`,`al`, `fromc`, `toc`, `seatno`,`cost`,`class`,`paymentid`) VALUES ('".$_SESSION['id']."','".$row['name']."','$alines','$from','$to','NULL','$rs','$class','$tid')";
            $result=$conn->query($sql);
            if($result){
                 header("location:../myticket.php?passe=".$passe);
            }else{
                 die("vghgf");
            }
           
        }
    }else{
        $_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Failed!</strong>Something went wrong Data Not Inserted!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        header("location:../myticket.php");
    }
    

}else{
    echo "ghnfj";
}