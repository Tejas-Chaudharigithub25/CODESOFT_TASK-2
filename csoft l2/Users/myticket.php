<?php
include '../db/db.php';
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:../log.php");
exit;
}

include 'comp/navuser.php';

?>

<div class="container">
     <?php
     
        $sqltf='SELECT * FROM `tickets` WHERE `uid`='.$_SESSION['id'].'';
        $restf=$conn->query($sqltf);
        if($restf->num_rows>0){
            foreach($restf as $rowtf){
                ?>
    <div class="row my-5 m-2 justify-content-center">
    <div class="card m-0 p-0 shadow rounded" style="width: 80%;">
        <nav class="navbar navbar-expand-lg bg-dark py-5 justify-content-around">
            <div>
            <img class="rounded m-2" width="40px" src="../alogo.png" alt="adminimg">
            <span><span class="navbar-brand text-white fw-bold">Book my - </span><span class="navbar-brand fw-bold" style=" color: rgb(182, 95, 240);">Trip</span></span>
            </div>
            <div>
                <?php
                 echo "<h5 class='text-white'>".$rowtf['name']."</h5>";
                ?>
            </div>    
        </nav>
        <div class="card-body">
            
            <div class="row">
                <div class="col">
                    <div class="h6">From</div>
                    <?php
                    echo $rowtf['fromc'];
                    ?>
                </div>
                <div class="col">
                    <div class="h6">To</div>
                    <?php
                    echo $rowtf['toc'];
                    ?>
                </div>
                <div class="col">
                    <div class="h6">Airline</div>
                    <?php
                    echo $rowtf['al'];
                    ?>
                </div>
                
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <div class="h6">Class</div>
                    <?php
                    echo $rowtf['class'];
                    ?>
                </div>
                <div class="col">
                    <div class="h6">Seat no.</div>
                    <?php
                    echo $rowtf['seatno'];
                    ?>
                </div>
                <div class="col">
                    <div class="h6">Transaction ID</div>
                    <?php
                    echo $rowtf['paymentid'];
                    ?>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <h6>Payment Details: </h6>
                    <?php
                    echo $rowtf['cost'];
                    ?>
                </div>
            </div>
      </div>

    </div>  
    
    </div>
    <?php
        }
        }else{
            ?> 
                <h4 class="text-center my-5">Tickets Are Not Booked</h4>
            <?php
        }
    ?>
</div>