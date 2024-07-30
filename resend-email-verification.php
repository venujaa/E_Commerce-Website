<?php
    session_start();
    include "UI_include.php";
    include INC_DIR.'header.html';
?>
<body>
        <nav>
            <div class="nav-left">
            <h3 class="logo">ABC Mobiles</h3>
            </div>
        </nav>
        <div class="py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">

                    <?php
                        if(isset($_SESSION['status']))
                        {   
                    ?>
                    <div class="alert alert-success">
                        <h5><?=$_SESSION['status'];?></h5>
                    </div>
                    <?php
                        unset($_SESSION['status']);
                        }
               
                    ?>
                        <div class="card">
                            <div class="card-header">
                                <h5>Resend Email Verification</h5>
                            </div>
                            <div class="card-body1 w-500 p-4">
                                <form action="resend-code.php" method="POST">
                                    <div class="form-group mb-3">
                                        <label>Email Address</label>
                                        <input type="text" name="email" class="form-control" placeholder="Enter Email Address">
                                    </div>
                                    <div class="form-group mb-3">
                                        <button type="submit" name="resend_email_verify_btn" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            body{
                background-image:url(images/bg5.jpg);
                background-repeat:no-repeat;
                background-size:cover;
            }
        </style>
</body>