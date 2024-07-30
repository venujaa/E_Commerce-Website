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
                                <h5>Reset Password</h5>
                            </div>
                            <div class="card-body1 p-4">
                                <form action="password-resent-code.php" method="POST">
                                    <div class="form-group mb-3">
                                        <label>Email Address</label>
                                        <input type="text" name="email" class="form-control" placeholder="Enter Email Address">
                                    </div>
                                    <div class="form-group mb-3">
                                        <button type="submit" name="password_rest_link" class="btn btn-primary">Send Password Reset Link</button>
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
