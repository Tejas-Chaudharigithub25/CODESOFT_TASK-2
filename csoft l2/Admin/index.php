<?php
session_start();
#=
if(!isset($_SESSION['adminlog']) || $_SESSION['adminlog']!=true){
        header("location:signin.php");
    exit;
}
?>

    <?php
    include '../db/db.php';
            include 'comp/nav.php';

            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
    ?> 
    
<div class="container">
    <div class="card my-5 shadow rounded" style="background-color:rgb(182 95 240 / 56%);">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md">
                <i class="fa fa-user-o fa-6"style="font-size:150px;" aria-hidden="true"></i>
                <p class="h4">Passengers</p>
                </div>
                <?php
                $sql="SELECT COUNT(*) AS Total FROM `travellers`";
                $exe=$conn->query($sql);
                foreach($exe as $erow){
                    echo "<div class='col-md'>
                    <h1 style='font-size:100px;'>".$erow['Total']."</h1>
                    </div>";
                }
                ?>
            </div>
        </div>
    </div>
    
    <div class="card my-5 shadow rounded" style="background-color:rgb(182 95 240 / 56%);">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md">
                <i class="fa fa-plane fa-6"style="font-size:150px;" aria-hidden="true"></i>
                <p class="h4">Flights</p>
                </div>
                <?php
                    $sqlfl = "SELECT COUNT(*) AS Total FROM `flight`";
                    $resfl = mysqli_query($conn, $sqlfl);
                    foreach($resfl as $flrow){
                    echo "<div class='col-md'>
                    <h1 style='font-size:100px;'>".$flrow['Total']."</h1>
                    </div>";
                    }
                ?>
            </div>
        </div>
      </div>

    <div class="card my-5 shadow rounded" style="background-color:rgb(182 95 240 / 56%);">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md">
                <i class="fa fa-money fa-6"style="font-size:150px;" aria-hidden="true"></i>
                <p class="h4">Amounts</p>
                </div>
                <?php
                    $passenSql = "SELECT sum(cost) AS Total FROM `tickets`";
                    $passenResult = mysqli_query($conn, $passenSql);
                    foreach($passenResult as $arow){
                        echo "<div class='col-md'>
                        <h1 style='font-size:100px;'>".$arow['Total']."</h1>
                        </div>";
                    }
                ?>
            </div>
        </div>
      </div>
    </div>
</div>
<?php
include 'comp/footer.php';
?>