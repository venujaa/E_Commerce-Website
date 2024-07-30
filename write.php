<?php

    session_start();
    include "UI_include.php";
    include INC_DIR."/process/p-write.php";
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
            <h1>Add Product</h1>
            <form method="post" action="" enctype="multipart/form-data">                 
                <div id = "inputname">
                    <input id = "txttitle" type="text" name="name" placeholder="Enter name" autofocus <?php if ($msg != 'Message saved successfully') $h->keepValues($name, 'textbox'); ?>>                   
                </div>
                <!-- image uploadings -->
                <div id="inputimage">
                    <input type="file" name="img_upload"
                    <?php
                     if ($msg != 'Message saved successfully') $h->keepValues($filePath, 'textarea');
                    ?>>
                </div>
                <div id="message">
                    <textarea name = "description"><?php if ($msg != 'Message saved successfully') $h->keepValues($description, 'textarea'); ?></textarea>
                    <!-- <script>CKEDITOR.replace('description', {height: 500}); -->
                    <!-- </script>         -->
                </div>
                <div id="price">
                <input id = "txttitle" type="text" name="price" placeholder="Enter Price" autofocus <?php if ($msg != 'Message saved successfully') $h->keepValues($price, 'textbox'); ?>>  
                </div>
                <div id = "error" class="error"><?php echo $msg; ?></div>
                <div id="submit-section">        
                    <input id = "postsubmit" class="btn btn-primary" type="submit" name="submit" value="Send" />                    

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
                    echo '<a href = "logout.php?Sadmin=1">Click here to logout |</a>  ';
                    echo '<a href = "index.php">Click here to read product</a>';
                }
            ?>
        </div>        
     <style>
        body{
                background-image:url(images/bg4.jpg);
                background-repeat:no-repeat;
                background-size:cover;
            }

            #container{
	/* background:#8ba5bf; */
	margin: 0px auto;
    padding-top: 10px;
	overflow:auto;
	width:80%;
	min-height:450px;
    /* border-radius: 6px; */
   
}

#container h1{
    font-size: 25px;
    padding: 10px;
    margin: 0;
    color: #fff;
    font-weight: bold;
    text-align: center;
    margin-top: 40px;
}

#inputname{
	width:70%;
	min-height:50px;
	margin:auto;
	padding:0;
}



#txttitle{
    width: 100%;
    font-size: 20px;
    /* margin: 20px 0 5px 0; */
    margin: 5px;
    height: 35px;
}

#inputimage{
    width:70%;
	min-height:10px;
	margin:auto;
	padding:0;
}

#message{
	width:70%;
	background:#f4f4f4;
	height:100px;
	margin:20px auto;
	overflow:auto;
}

#price{
    width:70%;
	min-height:50px;
	margin:auto;
	padding:0;
}

#submit-section{
    width: 70%;
    min-height: 50px;
    margin: 12px auto;
    padding: 0;
}

#postlogout{
    font-weight:bolder;
}
     </style>      
	</body>
</html>