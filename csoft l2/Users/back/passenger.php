<?php
include '../../db/db.php';
session_start();

if($_POST){
    
    $name=$conn->escape_string($_POST['fname']);
    $cno=$conn->escape_string($_POST['cno']);
    $dob=$conn->escape_string($_POST['dob']);

    $from=$conn->escape_string($_GET['from']);
    $to=$conn->escape_string($_GET['to']);
    $alines=$conn->escape_string($_GET['al']);
    $class=$conn->escape_string($_GET['class']);
    $passe=$conn->escape_string($_GET['passe']);
    $rs=$conn->escape_string($_GET['rs']);

    $sql="INSERT INTO `travellers` (`id`,`uid`,`name`,`cno`, `dob`) VALUES ('NULL','".$_SESSION['id']."','$name','$cno','$dob')";
    $rest=$conn->query($sql);

    
    if($rest){
        
        header("location:../payment.php?from=$from&to=$to&al=$alines&class=$class&passe=$passe&rs=".$rs*$passe."");
            
    }else{
        echo "gfgdh";
        header("location:../payment.php");
    }
    

}else{
    echo "ghnfj";
}