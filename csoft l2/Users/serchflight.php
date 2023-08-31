<?php
include '../db/db.php';
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:../log.php");
exit;
}
include 'comp/navuser.php';
if($_POST) {
    
    if($_GET['id']==1){
      $from = $conn->escape_string($_POST['from']);
      $to = $conn->escape_string($_POST['to']);
      $depart = $conn->escape_string($_POST['depart']);
      $class = $conn->escape_string($_POST['class']);
      $passe = $conn->escape_string($_POST['passe']);

      $sql = "SELECT * FROM flight WHERE `gfrom`= '$from' AND `cfrom`= '$to' AND `depart` LIKE '$depart%'";
      $result = mysqli_query($conn,$sql);

     
?>
<div class="container my-5">
    <div class="row">
        <h3 class="my-3 m-0"><?php echo $from ;?> To <?php echo $to;?></h3>
        <table class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                <th scope="col">Sr. No.</th>
                <th scope="col">Airline</th>
                <th scope="col">Depart Time</th>
                <th scope="col">Arrival Time</th>
                <th scope="col">Price</th>
                <th scope="col">Buy</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $no = 1;
            if ($result->num_rows!= 0) {
                foreach ($result as $row ) {
                    $_SESSION['fid']=$row['id'];
                    echo '
                    <tr><td>' . $no++ . '</td>
                    <td>' . $row['alines'] . '</td>
                    <td>' . $row['depart'] . '</td>
                    <td>' . $row['arrive'] . '</td>
                    <td>' . $row['rs'] . '</td>
                    <td><button class="btn btn-primary" value='. $row['id'] .' data-bs-toggle="modal" data-bs-target="#exampleModal">Book Flight</button></td>
                    </tr>
                    '
                    ;?>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Passeger Form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?php
                            if(!isset($_SESSION['loggedin'])||$_SESSION['loggedin']!=true){
                                echo "<h5>Please Sign-In First or Create Account</h5>";
                            }else{
                                $oneway = "SELECT * FROM `flight` ,`alines` WHERE flight.cfrom = '$to' AND flight.gfrom = '$from' AND flight.depart Like '$depart%' AND alines.name ='" . $row['alines'] . "'";
                                $oneresult = mysqli_query($conn, $oneway);
                                
                                if($class=="Eco"){
                                    foreach($oneresult as $rowone){
                                        if($passe<=$rowone['eco']){
                                            $i=1;
                                            while($i<=$passe){
                                               ?>
                                               <div class="container">
                                               <form class="my-4" action="back/passenger.php?<?php echo 'from='.$from.'&to='.$to.'&al='.$row['alines'].'&class='.$class.'&passe='.$passe.'&rs='.$row['rs']*$passe;?>" method="post">
                                                <lable class="h5">Passenger <?php echo $i;?></lable><br>
                                                <div class="row">
                                                    <label class="h6 text-dark mt-3">Passenger Name</label>
                                                    <input class="form-control" name="fname" required type="text" placeholder="Enter Full Name">
                                                </div>
                                                <div class="row">
                                                    <label class="h6 text-dark mt-3">Passenger Contact No.</label>
                                                    <input class="form-control" name="cno" required type="number" placeholder="Enter Contact No.">
                                                </div>
                                                <div class="row">
                                                    <label class="h6 text-dark mt-3">Birth Date</label>
                                                    <input class="form-control" name="dob" required type="date" >
                                                </div>
                                                <div class="row my-3">
                                                    <button class="btn btn-primary w-25">Submit</button>
                                                </div>
                                                </form>
                                                </div><hr>
                                               <?php
                                               $i++;
                                            }
                                        }else{
                                            echo "Only ".$rowone['eco']." seats are available";
                                        }
                                    }
                 
                                }else{
                                    foreach($oneresult as $rowone){
                                        if($passe<=$rowone['buss']){
                                            $i=1;
                                            while($i<=$passe){
                                               ?>
                                               <div class="container">
                                               <form class="my-4" action="back/passenger.php?<?php echo 'from='.$from.'&to='.$to.'&al='.$row['alines'].'&class='.$class.'&passe='.$passe.'&rs='.$row['rs']*$passe;?>" method="post">
                                                <lable class="h5">Passenger <?php echo $i;?></lable><br>
                                                <div class="row">
                                                    <label class="h6 text-dark mt-3">Passenger Name</label>
                                                    <input class="form-control" name="fname" required type="text" placeholder="Enter Full Name">
                                                </div>
                                                <div class="row">
                                                    <label class="h6 text-dark mt-3">Passenger Contact No.</label>
                                                    <input class="form-control" name="cno" required type="number" placeholder="Enter Contact No.">
                                                </div>
                                                <div class="row">
                                                    <label class="h6 text-dark mt-3">Birth Date</label>
                                                    <input class="form-control" name="dob" required type="date" >
                                                </div>
                                                <div class="row my-3">
                                                    <button class="btn btn-primary w-25">Submit</button>
                                                </div>
                                                </form>
                                                </div><hr>
                                               <?php
                                               $i++;
                                            }
                                        }else{
                                            echo "Only ".$rowone['buss']." seats are available";
                                        }
                                    }
                                }
                            }
                            ?>
                        </div>
                        </div>
                    </div>
                    </div>
                    <?php
                    
                }
            }else{?>
                    <tr><h3 class="text-center">Flight not found</h3></tr>
                    <?php
                }
            ?>
            </tbody>
        </table>
    </div>
</div>
<?php
                
    }
    else if($_GET['id']==2){

        $from = $conn->escape_string($_POST['from2']);
        $to = $conn->escape_string($_POST['to2']);
        $depart = $conn->escape_string($_POST['depart2']);
        $arrive = $conn->escape_string($_POST['arrive2']);
        $class = $conn->escape_string($_POST['class2']);
        $passe = $conn->escape_string($_POST['passe2']);

        $sql2 = "SELECT * FROM `flight` WHERE `gfrom` = '$to' AND `cfrom` = '$from' AND `depart` Like '$arrive%'";
        $result2 = mysqli_query($conn,$sql2);
        ?>
        <div class="container my-5">
            <div class="row">
                <h3 class="my-3 m-0"><?php echo $from ;?> To <?php echo $to;?></h3>
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                        <th scope="col">Sr. No.</th>
                        <th scope="col">Airline</th>
                        <th scope="col">Depart Time</th>
                        <th scope="col">Arrival Time</th>
                        <th scope="col">Price</th>
                        <th scope="col">Buy</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
            if ($result2->num_rows!= 0) {
                foreach ($result2 as $row2) {
                    echo '<tr><td>' . $no++ . '</td>
                    <td>' . $row2['alines'] . '</td>
                    <td>' . $row2['depart'] . '</td>
                    <td>' . $row2['arrive'] . '</td>
                    <td>' . $row2['rs'] . '</td>
                    <td><a href="backwork/checklog.php" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Book Flight</a></td>
                    </tr>'
                    ;
                    ?>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Passeger Form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?php
                            if(!isset($_SESSION['loggedin'])||$_SESSION['loggedin']!=true){
                                echo "<h5>Please Sign-In First or Create Account</h5>";
                            }else{
                                $twoway = "SELECT * FROM `flight` ,`alines` WHERE flight.cfrom = '$to' AND flight.gfrom = '$from' AND flight.depart Like '$depart%' AND alines.name ='" . $row2['alines'] . "'";
                                $tworesult = mysqli_query($conn, $twoway);
                                if($class=="Eco"){
                                    foreach($tworesult as $rowtwo){
                                        if($passe<=$rowtwo['eco']){
                                            $i=1;
                                            while($i<=$passe){
                                               ?>
                                               <div class="container">
                                               <form class="my-4" action="back/passenger.php?<?php echo 'from='.$from.'&to='.$to.'&al='.$rowtwo['alines'].'&class='.$class.'&passe='.$passe.'&rs='.$rowtwo['rs']*$passe;?>" method="post">
                                                <lable class="h5">Passenger <?php echo $i;?></lable><br>
                                                <div class="row">
                                                    <label class="h6 text-dark mt-3">Passenger Name</label>
                                                    <input class="form-control" required type="text" name="fname" placeholder="Enter Full Name">
                                                </div>
                                                <div class="row">
                                                    <label class="h6 text-dark mt-3">Passenger Contact No.</label>
                                                    <input class="form-control" required type="number" name="cno" placeholder="Enter Contact No.">
                                                </div>
                                                <div class="row">
                                                    <label class="h6 text-dark mt-3">Birth Date</label>
                                                    <input class="form-control" name="dob" required type="date" >
                                                </div>
                                                <div class="row my-3">
                                                    <button class="btn btn-primary w-25">Submit</button>
                                                </div>
                                                </form>
                                                </div><hr>
                                               <?php
                                               $i++;
                                            }
                                        }else{
                                            echo "Only ".$rowtwo['eco']." seats are available";
                                        }
                                    }
                 
                                }else{
                                    foreach($tworesult as $rowtwo){
                                        if($passe<=$rowtwo['buss']){
                                            $i=1;
                                            while($i<=$passe){
                                               ?>
                                               <div class="container">
                                               <form class="my-4" action="back/passenger.php?<?php echo 'from='.$from.'&to='.$to.'&al='.$rowtwo['alines'].'&class='.$class.'&passe='.$passe.'&rs='.$rowtwo['rs']*$passe;?>" method="post">
                                                <lable class="h5">Passenger <?php echo $i;?></lable><br>
                                                <div class="row">
                                                    <label class="h6 text-dark mt-3">Passenger Name</label>
                                                    <input class="form-control" name="fname" required type="text" placeholder="Enter Full Name">
                                                </div>
                                                <div class="row">
                                                    <label class="h6 text-dark mt-3">Passenger Contact No.</label>
                                                    <input class="form-control" name="cno" required type="number" placeholder="Enter Contact No.">
                                                </div>
                                                <div class="row">
                                                    <label class="h6 text-dark mt-3">Birth Date</label>
                                                    <input class="form-control" name="dob" required type="date" >
                                                </div>
                                                <div class="row my-3">
                                                    <button class="btn btn-primary w-25">Submit</button>
                                                </div>
                                                </form>
                                                </div><hr>
                                               <?php
                                               $i++;
                                            }
                                        }else{
                                            echo "Only ".$rowtwo['buss']." seats are available";
                                        }
                                    }
                                }
                            }
                            ?>
                        </div>
                        </div>
                    </div>
                    </div>
                    <?php
                }
            }else{?>
                <tr><h3 class="text-center">Flight not found</h3></tr>
                <?php
            }
?>
                </tbody>
            </table>
        </div>
    </div>


<?php         
        }else{
            echo "flight not found";
        }
?>

<?php
    }
include '../comp/footer.php';
?>