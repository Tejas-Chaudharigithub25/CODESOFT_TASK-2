<?php
        include 'comp/header.php';
    ?>
    <section class="contact">
        <div class="container">
            <div class="row my-5">
                <div class="col-md-6 my-5">
                <label class="h3 text-dark">Contact Us</label>
                <div class="address offset-1">
                    <span class="h6">Address: </span><br>acb house, House no. 1234,<br> abcd Colany, Dist. abc, state Maharstra.<br>Pin no. 123456.
                    <br><br><span class="h6">E-Mail: </span><br>abcd@123.com.
                    <br><br><span class="h6">Phone No.: </span>1234567890.
                </div>
                </div>

                <div class="col-md-6 card shadow p-4 my-4" style="background-color: rgba(177, 19, 216, 0.247); border-radius: 0%; border: 0px;">
                
                <label class="h3 text-center text-dark">Contact Us</label>
                    <form action="backwork/contact.php" method="post">
                        <div class="row">
                            <div class="col-md-6">
                            <label class="h6 text-dark mt-3" >Name</label >
                            <input id="name" class="form-control " placeholder="Enter Name" type="text" name="name"required>
                            </div>
                            <div class="col-md-6">
                            <label class="h6 text-dark mt-3" >Contact no.</label >
                            <input id="cno" class="form-control" placeholder="Enter contact no." type="number" name="cno"required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <label class="h6 text-dark mt-3" >E-mail</label >
                            <input id="mail" class="form-control" placeholder="Enter E-mail" type="email" name="mail"required>
                            </div>
                            <div class="col-md-6">
                            <label class="h6 text-dark mt-3" >Subject</label >
                            <input id="sub" class="form-control" placeholder="Enter Subject" type="text" name="sub"required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="h6 text-dark mt-3" >Message</label >
                                <textarea id="des" class="form-control" placeholder="Enter message in description" name="des"required></textarea>
                            </div>
                        </div>
                        <div class="row my-4" style="margin-left:auto;">
                        
                        <button onclick="reset()" class="btn btn-success w-25" style="margin-right:5px;" >Reset</button>
                        <button  class="btn btn-success w-25" >Submit</button>
                        </div>

                    </form>
    <br>
                    
                </div>
                
            </div>
            </div>
            
        </div>

</section>

<?php
include 'comp/footer.php';
?>

