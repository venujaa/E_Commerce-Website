<?php

    session_start();
    include "UI_include.php";
    include INC_DIR."/process/p-delete.php";
    include INC_DIR.'header.html';

?>    
    <body> 
    <script>
            $(function(){
            setTimeout(function() {
                $('#error').fadeOut();
            }, 3000); 

            });
        </script>       
		<div id="container">
            <h1>Delete Product</h1>
            <form method="post" action="" >                 
                <div id = "inputname">
                    <input id = "txttitle" type="text" name="name" placeholder="Enter name" autofocus <?php if ($msg != 'product deleted successfully') $h->keepValues($name, 'textbox'); ?>>                   
                </div>
                <div id = "error" class="error"><?php //echo $msg;
                print_r($msg);
                ?></div>
                <div id="submit-section">        
                    <input id = "postsubmit" class="btn btn-primary" type="submit" name="submit" value="Delete" />                    

                </div>                
            </form>                
		</div>
        <div id = 'postlogout'>
            <?php
                if(isset($_SESSION['is_Admin']))
                {
                    echo '<a href = "logout.php?admin=1">Click here to logout</a> | ';
                    echo '<a href = "index.php">Click here to read product</a>';
                }
                if(isset($_SESSION['is_Sadmin']))
                {
                    echo '<a href = "logout.php?Sadmin=1">Click here to logout</a> | ';
                    echo '<a href = "index.php">Click here to read product</a>';
                }
            ?>
        </div>  
        <style>
         body{
                background-image:url(images/bg4.jpg);
                background-repeat:no-repeat;
                background-size:cover;
                min-height:100vh;
            }



        </style>      
        
	</body>
</html>