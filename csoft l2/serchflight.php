<?php
include 'db/db.php';
session_start();
if(isset($_POST['from'])) {
    include 'comp/header.php';
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
                    echo '<tr><td>' . $no++ . '</td>
                    <td>' . $row['alines'] . '</td>
                    <td>' . $row['depart'] . '</td>
                    <td>' . $row['arrive'] . '</td>
                    <td>' . $row['rs'] . '</td>
                    <td><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Book Flight</button></td>
                    </tr>'
                    ;
                    
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
        $sql2 = "SELECT * FROM flight WHERE `gfrom`= '$to' AND `cfrom`= '$from' AND `depart` LIKE '$depart%'";
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
                foreach ($result2 as $row2 ) {
                    echo '<tr><td>' . $no++ . '</td>
                    <td>' . $row2['alines'] . '</td>
                    <td>' . $row2['depart'] . '</td>
                    <td>' . $row2['arrive'] . '</td>
                    <td>' . $row2['rs'] . '</td>
                    <td><button href="backwork/checklog.php" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Book Flight</button></td>
                    </tr>'
                    ;
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5>Please Sign-In First or Create Account</h5>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
        <a href="log.php" type="button" class="btn btn-primary">Sign-In</a>
      </div>
    </div>
  </div>
</div>
<?php
    }else{
        include 'comp/header.php';
    }
    ?>
    <div class="container my-5">
        <div class="row text-center">
            <lable class="text-center h2 text-danger">Please Fill All Fields.</lable>
        </div>
    </div>
    <?php
include 'comp/footer.php';
?>