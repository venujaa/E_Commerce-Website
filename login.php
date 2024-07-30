<?php

    session_start();
    include "UI_include.php";
    include INC_DIR."/process/p-login.php";
    include INC_DIR.'header.html';

?>

    <body>
    <div class="form">   
        
        <div class = "new">
        <?php
            if (isset($_GET['new']))
                echo 'ACCOUNT CREATED SUCCESSFULLY..! PLEASE VERIFY YOUR EMAIL.';
        ?>
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
        </div>
        <div class="heading">
            <!-- <i class="material-icons">account_box</i> -->
            <h4 class="modal-title">Login to Your Account</h4>
        </div>

        <form action="" method="post" class="form-horizontal">
            <div class="form-group top">
                <label class="control-label">Email</label>
                <div>
                    <input type="text" class="form-control" name="email"<?php $h->keepValues($email, 'textbox'); ?>>
                </div>        	
            </div>
            <div class="form-group">
                <label class="control-label">Password</label>
                <div>
                    <input type="password" class="form-control" name="password">
                </div>        	
            </div>
            <div class = "formerror"><?php echo $msg; ?></div>                
            <div class="form-group">
                <div>
                    <center><button type="submit" name = "submit" class="btn btn-primary btn-lg">Log In</button></center>
                </div>
                <a href="password-reset.php" class="float-end">Forgot Your Password?</a>  
            </div>		           
        </form>
        <div class="bottom-text">
            Did not recieve your verification Email?
            <a href="resend-email-verification.php">Resent</a>
        </div>			
        <div class="bottom-text">Don't have an account? <a href="signup.php">Sign up</a></div>
    </div>
    
    <style>
            body{
                background-image:url(images/bg2.jpg);
                background-repeat:no-repeat;
                background-size:cover;
            }

            .heading h4{
                color:#fff;
            }

            .bottom-text{
                color:#000;
                font-weight:bolder;
            }

            .bottom-text a{
                color:#fff;
                font-weight:bolder;
            }
        </style>
    </body>
</html>                                         		                            