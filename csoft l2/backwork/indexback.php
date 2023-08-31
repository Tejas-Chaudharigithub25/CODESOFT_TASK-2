<?php
  include '../db/db.php';
  if($_POST) {
    if($_GET['id']==1){
        // $id=$conn->escape_string($_POST['id']);
        $from = $conn->escape_string($_POST['from']);
        $to = $conn->escape_string($_POST['to']);
        // $lines = $conn->escape_string($_POST['lines']);
        $depart = $conn->escape_string($_POST['depart']);
        // $arrive = $conn->escape_string($_POST['arrive']);
        $claass = $conn->escape_string($_POST['class']);
        $passe = $conn->escape_string($_POST['passe']);

        $sql = "SELECT * FROM flight WHERE `cfrom`= '$from' AND `gfrom`= '$to' AND `depart` LIKE '$depart%'";
        $result = mysqli_query($conn,$sql);

        if($result){
                $_SESSION['modaldata'] = '
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h3>' . $from . ' To ' . $to . '</h3>
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
                        <tbody>';

                $no = 0;

                while ($row = $result->fetch_assoc()) {

                    if ($claass == "Eco") {
                        $classsql = "SELECT * FROM `flight`, `airlines` WHERE `airlines.name`=" . $row['alines'] . " AND `airlines.eco`>=$passe AND `flight.gfrom`=$from";
                        $classresult = mysqli_query($conn, $classsql);
                        foreach ($classresult as $classrow) {
                            $_SESSION['modaldata'] .= '<tr>
                            <td>' . $no++ . '</td>
                            <td>' . $classrow['alines'] . '</td>
                            <td>' . $classrow['depart'] . '</td>
                            <td>' . $classrow['arrive'] . '</td>
                            <td>' . $classrow['rs'] . '</td>
                            <td><button class="btn btn-primary">Book Flight</button></td>
                            </tr>';
                        }
                    } elseif ($claass == "Bus") {
                        $classsql2 = "SELECT * FROM `flight`, `airlines` WHERE `airlines.name`=" . $row['alines'] . " AND `airlines.buss` >= $passe AND `flight.gfrom`=$from AND `flight.cfrom`=$go";
                        $classresult2 = mysqli_query($conn, $classsql2);

                        foreach ($classresult2 as $classrow2) {
                            $_SESSION['modaldata'] .= '<tr>
                            <td>' . $no++ . '</td>
                            <td>' . $classrow2['alines'] . '</td>
                            <td>' . $classrow2['depart'] . '</td>
                            <td>' . $classrow2['arrive'] . '</td>
                            <td>' . $classrow2['rs'] . '</td>
                            <td><button class="btn btn-primary">Book Flight</button></td>
                            </tr>';
                        }
                    } else {
                        
                        $_SESSION['msg']=
                        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Sorry!</strong>Flight are Not Found.<br>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                }

                $_SESSION['modaldata'] .= '
                        </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Understood</button>
                    </div>
                    </div>
                </div>
                </div>';

        }else{
            $_SESSION['msg']=
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Sorry!</strong>Flight are Not Found.<br>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            header("location:../index.php");
        }

    }
    if($_GET['id']==2){
        // $id=$conn->escape_string($_POST['id']);
        $from = $conn->escape_string($_POST['from2']);
        $to = $conn->escape_string($_POST['to2']);
        // $lines = $conn->escape_string($_POST['lines']);
        $depart = $conn->escape_string($_POST['depart2']);
        $arrive = $conn->escape_string($_POST['arrive2']);
        $class = $conn->escape_string($_POST['class2']);
        $passe = $conn->escape_string($_POST['passe2']);

        $sql = "SELECT * FROM flight WHERE `cfrom`= '$from' AND `gfrom`= '$to' AND `depart` LIKE '$depart%' AND `arrive` LIKE '$arrive%'";
        $result = mysqli_query($conn,$sql);

        if($result){
        
            $_SESSION['modaldata'] = '
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h3>' . $from . ' To ' . $to . '</h3>
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
                        <tbody>';
            // $_SESSION['msg']='
            // <div class="alert alert-success alert-dismissible fade show" role="alert">
            // <strong>SuccessFully!</strong>Flight Book are Successfully.
            // <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            // </div>'; 
            
            header("location:../index.php");
            
        }else{
            $_SESSION['msg']=
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Sorry!</strong>Flight are Not Found.<br>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            header("location:../index.php");
        }

    }
}
?>

<?php

// if (isset($_POST['from'])) {
//     $source = mysqli_escape_string($conn, $_POST['from']);
//     $Destination = mysqli_escape_string($conn, $_POST['to']);
//     $departure = mysqli_escape_string($conn, $_POST['depart']);
//     $class = mysqli_escape_string($conn, $_POST['class']);
//     $passenger = mysqli_escape_string($conn, $_POST['passenger']);
//     $return = mysqli_escape_string($conn, $_POST['return']);

//     $searchSql = "SELECT * FROM `flights` WHERE `source` = '$source' AND `Destination` = '$Destination' AND `departure` Like '$departure%'";
//     $searchResult = mysqli_query($conn, $searchSql);

//     $returnsearchSql = "SELECT * FROM `flights` WHERE `source` = '$Destination' AND `Destination` = '$source' AND `departure` Like '$return%'";
//     $returnsearchResult = mysqli_query($conn, $returnsearchSql);
// }
?>

<!-- Modal -->

