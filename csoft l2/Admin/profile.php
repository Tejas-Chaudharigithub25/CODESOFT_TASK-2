<?php
session_start();
if(!isset($_SESSION['adminlog']) || $_SESSION['adminlog']!=true){
        header("location:signin.php");
    exit;
}
include '../db/db.php';

include 'comp/nav.php';
// session_start();
if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>
<div class="container">

<div class="row-12">
<div class="card shadow p-4 my-4">
    <div class="row">
    <div class="col-md-6">
        <label class="h3 text-center text-dark">Change password</label>
        
            <form action="back/signout.php" method="post">
                <div class="row">
                    <div class="col-md-6">
                    <label class="h6 text-dark mt-3" >Username</label >
                    <input id="name" class="form-control " placeholder="Enter Current Username" type="text" name="name"required>
                    </div>
                    <div class="col-md-6">
                    <label class="h6 text-dark mt-3" >E-mail</label >
                    <input id="cno" class="form-control" placeholder="Change E-mail" type="email" name="mail"required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <label class="h6 text-dark mt-3" >Password</label >
                    <input id="mail" type="password" class="form-control" placeholder="Change Password" name="pass"required>
                    </div>
                </div>
                
                <div class="row my-4" style="margin-left:auto;">
                
                <button onclick="reset()" class="btn btn-success w-25" style="margin-right:5px;" >Reset</button>
                <button  class="btn btn-success w-25" >Submit</button>
                </div>

            </form>
        <br>
    </div>
    <div class="col-md-5 offset-1">
        <label class="h3 text-dark">Sign-Out</label><br>
        <a class="nav-link  btn-primary text-white w-50 m-2 text-center" href="back/sout.php">Sign-Out</a>
    </div>
    </div>
    </div>
    </div>
    </div>
</div>
<?php
include 'comp/footer.php';
?>