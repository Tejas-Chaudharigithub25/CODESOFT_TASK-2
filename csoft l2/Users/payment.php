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
    <div class="row my-5 m-2">
        
        <div class="card shadow rounded">
            <div class="card-content">
                <div class="text-dark h4 fw-bold">Payment Invoice</div>
                <hr>
                <div class="row justify-content-around">
                    <div class="col">
                        <span class="fw-bold"> From: </span>
                       <?php echo $_GET['from'];?>
                    </div>
                    <div class="col">
                        <span class="fw-bold">To: </span><?php echo $_GET['to'];?>
                    </div>
                    <div class="col">
                        <span class="fw-bold">Airline: </span><?php echo $_GET['al'];?>
                    </div>
                </div><hr>
                <div class="row">
                    <div class="col">
                        <span class="fw-bold">Class: </span><?php echo $_GET['class'];?>
                    </div>
                    <div class="col">
                        <span class="fw-bold">Passengers: </span><?php echo $_GET['passe'];?>
                    </div>
                </div><hr>
                <div class="row">
                    <div class="col">
                        <span class="fw-bold">Rs.: </span><?php echo $_GET['rs']/$_GET['passe'];?>
                    </div>
                    <div class="col mb-4">
                        <button id="rzp-button1" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Pay</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include '../comp/footer.php';
?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
            <div class="col-md-6">
                <img width="80%" src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=example no.&choe=UTF-8" alt="payqr">
            <!-- enter your UPI ID in the URL on place 1234567890 -->
            <div>Scan QR and and pay</div>
            </div>
            <div class="col-md-6">
                <form action="back/myticket.php?<?php echo "from=".$_GET['from']."&to=".$_GET['to']."&al=".$_GET['al']."&class=".$_GET['class']."&passe=".$_GET['passe']."&rs=".$_GET['rs'];?>" method="post">
                    <input type="text" name="tid" class="form-control" required placeholder="Enter Transaction Id of payment">
                    <button class="btn btn-primary">submit</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
