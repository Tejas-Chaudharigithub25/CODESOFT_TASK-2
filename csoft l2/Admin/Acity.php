<?php
session_start();
if(!isset($_SESSION['adminlog']) || $_SESSION['adminlog']!=true){
        header("location:signin.php");
    exit;
}
include '../db/db.php';
$sql="SELECT * FROM city";
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
        <label class="h3 text-center text-dark">Add City</label>
        
            <form action="back/city.php" method="post">
                <div class="row">
                    <div class="col">
                    <label class="h6 text-dark mt-3" >City</label >
                    <input id="name" class="form-control " placeholder="Enter City Name" type="text" name="name"required>
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

        <label class="h3 text-center text-dark">City Table</label>


        <div class="table-responsive">
            <table id="myTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                <th>Sr. No.</th>
                <th>Cities Data</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach ($r as $row) {
                echo '
                <tr>
                    <td>'.$row['id'].'</td>
                    <td>'.$row['name'].'</td>
                    <td>
                    <a class="btn btn-xs btn-danger" href="back/city.php?id='.$row['id'].'"><i class="fa fa-trash mr-2"></i>Delete</a>
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