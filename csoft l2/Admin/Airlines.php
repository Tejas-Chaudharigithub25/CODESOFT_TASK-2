<?php
session_start();
if(!isset($_SESSION['adminlog']) || $_SESSION['adminlog']!=true){
        header("location:signin.php");
    exit;
}
include '../db/db.php';
$sql="SELECT * FROM alines";
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
        <div class="row my-5">
            <label class="h3 text-center text-dark">Add Airlines</label>
            
                <form action="back/lines.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                        <label class="h6 text-dark mt-3" >Airlines Name</label >
                        <input id="name" class="form-control " placeholder="Enter Name" type="text" name="name"required>
                        </div>
                        <div class="col-md-6">
                        <label class="h6 text-dark mt-3" >Seats</label >
                        <input id="name" class="form-control " placeholder="Enter Total Seats" type="number" name="seat"required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        <label class="h6 text-dark mt-3" >Economy Seats</label >
                        <input id="name" class="form-control " placeholder="Enter Name" type="number" name="eco"required>
                        </div>
                        <div class="col-md-6">
                        <label class="h6 text-dark mt-3" >Business Seats</label >
                        <input id="name" class="form-control " placeholder="Enter Seats" type="number" name="buss"required>
                        </div>
                    </div>
                    <div class="row my-4" style="margin-left:auto;">
                    
                    <button onclick="reset()" class="btn btn-success w-25" style="margin-right:5px;" >Reset</button>
                    <button  class="btn btn-success w-25" >Submit</button>
                    </div>

                </form>
            <br>
        </div> 
        
        <div class="row">
        <label class="h3 text-center text-dark">Airlines Table</label>

        <div class="table-responsive m-t-40">
            <table id="myTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                <th>Sr. No.</th>
                <th>Name</th>
                <th>Total Seats</th>
                <th>No. of Business Seat</th>
                <th>No. of Economy Seat</th>
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
                    <td>'.$row['name'].'</td>
                    <td>'.$row['seats'].'</td>
                    <td>'.$row['buss'].'</td>
                    <td>'.$row['eco'].'</td>
                    <td>
                    <a class="btn btn-xs btn-danger" href="back/lines.php?id='.$row['id'].'"><i class="fa fa-trash mr-2"></i>Delete</a>
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