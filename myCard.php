<?php

    session_start();
    include "UI_include.php";
    include INC_DIR.'header.html';
    include INC_DIR.'/process/p-myCard.php';

    if (isset($_POST['remove'])){
        if ($_GET['action'] == 'remove'){
            foreach ($_SESSION['add-toCard'] as $key => $value){
                if($value["product-name"] == $_GET['id']){
                    unset($_SESSION['add-toCard'][$key]);
                    echo "<script>alert('Product has been Removed...!')</script>";
                    echo "<script>window.location = 'myCard.php'</script>";
                }
            }
        }
      }
      
?>
<body>
    
    <nav>
        <div class="nav-left">
        <h3 class="logo">ABC Mobiles</h3>
        </div>
        <div class="nav-right">
        <div class="nav-user-icon online" onclick="settingsMenuToggle()">
            <img src="images/profile-pic.png">
        </div>

        </div>
        <!-- menu bar -->
        <div class="settings-menu">
            <div id="dark-btn">
                <span></span>
            </div>
            <div class="settings-menu-inner">
                <div class="user-profile">
                    <img src="images/profile-pic1.png">
                    <div>
                        <?php
                            if(isset($_SESSION['username']))
                            {
                                echo "<p>{$_SESSION['username']}</p>";
                            }
                            else
                            {
                                echo'<p>User Name</p>';
                            }
                        
                            if(isset($_SESSION['is_Admin']))
                            {
                                
                                echo'<p>Admin</p>';
                            }
                            else if(isset($_SESSION['is_Sadmin']))
                            {   
                                echo'<p>Super Admin</p>';
                            }
                        ?>
                    </div>
                </div>
                <div class="user-profile">
                    <img src="images/email-pic.png">
                    <div>
                        <?php
                            if(isset($_SESSION['email']))
                            {
                                echo "<p>{$_SESSION['email']}</p>";
                            }
                            else
                            {
                                echo'<p>Email</p>';
                            }
                        ?>
                    </div>
                </div>
                <div class="user-profile">
                    <img src="images/phone-pic.png">
                    <div>
                        <?php
                            if(isset($_SESSION['phone']))
                            {
                                echo "<p>{$_SESSION['phone']}</p>";
                            }
                            else
                            {
                                echo'<p>Phone</p>';
                            }
                        ?>    
                    </div>
                </div>
                <hr>
                <div class="user-profile">
                    <?php
                    if(isset($_SESSION['email']))
                    {
                        echo '<img src="images/logout-pic.png">';
                        echo '<a href="logout.php">Log Out</a>';
                    }
                    ?>
                </div>
            </div>
        </div>

    </nav> 
 
    <div class="myCard-container">
        <div class="left-container pl-5">
            <h4>My Card</h4>
            <hr>
            <?php
            
            $total=0;
            if(isset($_SESSION['add-toCard']))
            {
                $reader=new BlogReader();
        
                $products=$reader->getProductsFromDB();
                $images=$reader->getImagesFromDB();
                $product_names=array_column($_SESSION['add-toCard'],"product-name");              
                foreach($product_names as $product_name)
                {
                    foreach($products as $product)
                    {
                        if($product['name']==$product_name)
                        {
                            foreach($images as $image)
                            {
                                if($image['name']==$product_name)
                                {
                                    MyCard($product['name'],$product['price'],$product['description'],$image['location']);
                                    $total = $total + (int)$product['price'];
                                }
                            }
                        }
                    }
                }

            }
            else
            {
                echo "<h5>Cart is Empty</h5>";
            }
            ?>
        </div>
        <div class="right-container">
            <div class="col-md-10 offset-md-1 border rounded mt-5 bg-white h-100">

                <div class="pt-4">
                    <h6>PRICE DETAILS</h6>
                        <hr>
                    <div class="row price-details">
                        <div class="col-md-6">
                            <?php
                            if (isset($_SESSION['add-toCard'])){
                                $count  = count($_SESSION['add-toCard']);
                                echo "<h6>Price ($count items)</h6>";
                             }else{
                                echo "<h6>Price (0 items)</h6>";
                            }
                            ?>
                            <h6>Delivery Charges</h6>
                            <hr>
                            <h6>Amount Payable</h6>
                        </div>
                        <div class="col-md-6">
                            <h6>$<?php echo $total; ?></h6>
                            <h6 class="text-success">FREE</h6>
                            <hr>
                            <h6>$<?php
                            echo $total;
                            ?></h6>
                        </div>
                    </div>
                   <div class="container-fluid text-center bg-light py-3">
                    <?php
                        if($total > 0)
                       {
                            //echo "<a href=\"payment.php?amount='".$total."'class='btn btn-warning'>PAYMENT</a>";
                            // echo "<a href=\"payment.php?amount='".$total."' class='btn btn-warning'>PAYMENT</a>";?>
                             <a href="payment.php?amount=<?php echo $total;?>" class="btn btn-warning">PAYMENT</a>
                      <?php }
                    ?>
                    
                     
                    </div> 
                    
                </div>

            </div>

        </div>
        <!--  -->
    </div>
    <div id = 'postlogout'>
        <a href = "index.php">Click here to read product</a>';
    </div>
  </div>


    <style>
        .myCard-container{
            display: grid;
            grid-template-columns:1fr 1fr ;
        }
        body{
                background-image:url(images/images.jpg);
                background-repeat:no-repeat;
                background-size:cover;
            }

        .right-container{
            margin-bottom:50px;
        }

        #postlogout a{
            color:#3503be;
            font-weight:bolder;
        }
    </style>
    
    <script src="includes/js/script.js"></script>
</body>  