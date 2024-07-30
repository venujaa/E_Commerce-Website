<?php

include "UI_include.php";
include INC_DIR."/process/p-adminSignup.php";
include INC_DIR.'header.html';

?>
 
        <body>
        <div class="form">
            <div class="heading">
                <h4 class="modal-title">Register Admin for An Account</h4>
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
        </div>
        <div id = 'postlogout'>
            <?php
                echo '<a href = "logout.php?Sadmin=1">Click here to logout</a> | ';
                echo '<a href = "index.php">Click here to read product</a>';
            ?>
        </div>

        <style>
             body{
                background-image:url(images/bg2.jpg);
                background-repeat:no-repeat;
                background-size:cover;
                min-height:100vh;
            }

            #postlogout a{
                color:#fff;
                font-weight:bolder;
            }

            .modal-title{
                color:#fff;
                
            }
        </style>
    </body>
</html>                              