<?php
// session_start();
include "UI_include.php";
include INC_DIR."/process/p-signup.php";
include INC_DIR.'header.html';

?>
 
        <body>
        <div class="form">
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
            <div class="heading">
                <h4 class="modal-title">Register for An Account</h4>
            </div>
            
            <form action="" method="post" class="form-horizontal">
                <div class="form-group top">
                    <label class="control-label">Email</label>
                    <div>
                        <input type="text" class="form-control" name="email" <?php $h->keepValues($email, 'textbox'); ?>>
                    </div>        	
                </div>
                <div class="form-group">
                    <label class="control-label">Password</label>
                    <div>
                        <input type="password" class="form-control" name="password">
                    </div>        	
                </div>
                <div class="form-group">
                    <label class="control-label">Confirm Password</label>
                    <div>
                        <input type="password" class="form-control" name="ConfirmPassword">
                    </div>        	
                </div>
                <div class="form-group top">
                    <label class="control-label">Username</label>
                    <div>
                        <input type="text" class="form-control" name="username">
                    </div>        	
                </div>
                <div class="form-group">
                    <label class="control-label">Phone number</label>
                    <div>
                        <input type="tel" class="form-control" name="phonenumber">
                    </div>        	
                </div>
                <div class = "formerror"><?php echo $msg; ?></div>
                <div class="form-group">
                    <div>
                        <center><button type="submit" name = "submit" class="btn btn-primary btn-lg">Sign Up</button></center>
                    </div>  
                </div>		      
            </form>
            <div class="bottom-text">Already have an account? <a href="login.php">Login here</a></div>
        </div>

        <style>
            body{
                background-image:url(images/phone2.png);
                background-repeat:no-repeat;
                background-size:cover;
            }

            .heading h4{
                color:#fff;
            }

            .bottom-text{
                color:#fff;
            }

            .bottom-text a{
                color:#77c1ef;
            }
        </style>
    </body>
</html>                              