<?php
session_start();
if(!isset($_SESSION['adminlog']) || $_SESSION['adminlog']!=true){
        header("location:signin.php");
    exit;
}
include '../db/db.php';
$sql="SELECT * FROM `flight`";
$r=mysqli_query($conn,$sql);

include 'comp/nav.php';

if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?> 
<div class="container">
<div class="card shadow my-5">
    <div class="card-body">
        <div class="row">
            <label class="h3 text-center text-dark">Add Flight</label>
        
            <form action="back/flight.php" method="post">
                <div class="row">
                    <div class="col-md-6">
                    <label class="h6 text-dark mt-3" >Depart</label >
                    <select id="mail" class="form-select" name="go"required>
                        <option value="" selected disabled>Select Airlines to depart</option>
                    <?php
                        $csql = "SELECT * FROM city";
                        $cresult = mysqli_query($conn, $csql);
                        foreach ($cresult as $crow) {
                            echo '<option value="' . $crow['name'] . '">' . $crow['name'] . '</option>';
                        }
                    ?>
                    </select>
                    </div>
                    <div class="col-md-6">
                    <label class="h6 text-dark mt-3" >Depart Time</label >
                    <input id="mail" type="date" class="form-control" name="gtime"required>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <label class="h6 text-dark mt-3" >Arrive</label >
                    <select id="mail" class="form-select" name="come"required>
                        <option value="" selected disabled>Select Airlines from arrive</option>
                    <?php
                        $csql = "SELECT * FROM city";
                        $cresult = mysqli_query($conn, $csql);
                        foreach ($cresult as $crow) {
                            echo '<option value="' . $crow['name'] . '">' . $crow['name'] . '</option>';
                        }
                    ?>
                    </select>
                    </div>
                    <div class="col-md-6">
                    <label class="h6 text-dark mt-3" >Arrive Time</label >
                    <input id="mail" type="date" class="form-control" name="ctime"required>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <label class="h6 text-dark mt-3" >Airline</label >
                        <select class="form-select" name="aname" id="mail">
                            <option value="" selected disabled>Select Airlines</option>
                            <?php
                                $asql = "SELECT * FROM alines";
                                $aresult = mysqli_query($conn, $asql);
                                foreach ($aresult as $arow) {
                                    echo '<option value="' . $arow['name'] . '">' . $arow['name'] . '</option>';
                                }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="h6 text-dark mt-3" >Ticket Price</label >
                        <input id="mail" type="number" class="form-control" placeholder="Enter price per ticket" name="price"required>
                    </div>
                </div>
                <div class="row my-4" style="margin-left:auto;">
                
                <button onclick="reset()" class="btn btn-success w-25" style="margin-right:5px;" >Reset</button>
                <button  class="btn btn-success w-25" >Submit</button>
                </div>

            </form>
            <br>
        </div>
        <hr>
        <div class="row my-5">
            <label class="h3 text-center mb-4 text-dark">Flight Table</label>
            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                    <th>Sr. No.</th>
                    <th>Airlines</th>
                    <th>Arrive From</th>
                    <th>Depart To</th>
                    <th>Depart Time</th>
                    <th>Arrive Time</th>
                    <th>Seats</th>
                    <th>Price</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($r as $row) {
                        $i=0+1;
                    echo '
                    <tr>
                        <td>'.$i++.'</td>
                        <td>'.$row['alines'].'</td>
                        <td>'.$row['cfrom'].'</td>
                        <td>'.$row['gfrom'].'</td>
                        <td>'.$row['depart'].'</td>
                        <td>'.$row['arrive'].'</td>
                        <td>'.$row['seats'].'</td>
                        <td>'.$row['rs'].'</td>
                        <td>
                        <a class="btn btn-xs btn-danger" href="back/flight.php?id='.$row['id'].'"><i class="fa fa-trash mr-2"></i>Delete</a>
                        </td>
                    </tr>
                    ';
                    }
                    ?>   
                </tbody>
    
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<?php
include 'comp/footer.php';
?>