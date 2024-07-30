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
                                <h5>Change Password</h5>
                            </div>
                            <div class="card-body1 p-4">
                                <form action="password-resent-code.php" method="POST">
                                <input type="hidden" name="password_token" value="<?php if(isset($_GET['token'])){echo $_GET['token'];}?>" class="form-control" placeholder="Enter Email Address">
                                    <div class="form-group mb-3">
                                        <label>Email Address</label>
                                        <input type="text" name="email" value="<?php if(isset($_GET['email'])){echo $_GET['email'];}?>" class="form-control" placeholder="Enter Email Address">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>New Password</label>
                                        <input type="password" name="new_password" class="form-control" placeholder="Enter New Password">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Confirm Password</label>
                                        <input type="password" name="confirm_password" class="form-control" placeholder="Enter Confirm Password">
                                    </div>
                                    <div class="form-group mb-3">
                                        <button type="submit" name="password_update" class="btn btn-primary">Update Password</button>
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
