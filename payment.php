<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    
    <!-- custom css file link  -->
    <!-- <link rel="stylesheet" href="payment.css"> -->

<!-- </head> -->
<?php
session_start();
include "UI_include.php";
include INC_DIR."/classes/Database.php";
include INC_DIR."/process/p-payment.php";
include INC_DIR.'header.html';

?>
<link rel="stylesheet" href="payment.css">
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

<div class="container">

    <form action="" method="POST">
        <div class="row">

            <div class="col">

                <h3 class="title">billing address</h3>

                <div class="inputBox">
                    <span>full name :</span>
                    <input type="text" name="customer" placeholder="john deo">
                </div>
                <div class="inputBox">
                    <span>email :</span>
                    <input type="email" name="Email" value="<?php echo $_SESSION['email'];?>" placeholder="example@example.com">
                </div>
                <div class="inputBox">
                    <span>address :</span>
                    <input type="text" name="address" placeholder="room - street - locality">
                </div>
                <div class="inputBox">
                    <span>city :</span>
                    <input type="text" placeholder="mumbai">
                    
                </div>
        
                <!-- <input type="hidden" name="amount" value=<?php //echo $_GET['amount'];?>> -->
                <?php
                    echo "<input type=\"hidden\" name=\"amount\" value=".$_GET['amount'].">";
                ?>
                

                <div class="flex">
                    <div class="inputBox">
                        <span>state :</span>
                        <input type="text" placeholder="india">
                    </div>
                    <div class="inputBox">
                        <span>zip code :</span>
                        <input type="text" placeholder="123 456">
                    </div>
                </div>

            </div>

            <div class="col">

                <h3 class="title">payment</h3>

                <div class="inputBox">
                    <span>cards accepted :</span>
                    <img src="images/card_img.png" alt="">
                </div>
                <div class="inputBox">
                    <span>name on card :</span>
                    <input type="text" placeholder="mr. john deo">
                </div>
                <div class="inputBox">
                    <span>credit card number :</span>
                    <input type="number" placeholder="1111-2222-3333-4444">
                </div>
                <div class="inputBox">
                    <span>exp month :</span>
                    <input type="text" placeholder="january">
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>exp year :</span>
                        <input type="number" placeholder="2022">
                    </div>
                    <div class="inputBox">
                        <span>CVV :</span>
                        <input type="text" placeholder="1234">
                    </div>
                </div>

            </div>
        </div>
        
        <input type="submit" name="submit" value="proceed to checkout" class="submit-btn">

    </form>
    <?php
    // include INC_DIR."/process/p-payment.php";
    ?>

</div>   

<style>
    body{
                background-image:url(images/bg10.jpg);
                background-repeat:no-repeat;
                background-size:cover;
            }
</style>
    
</body>
</html>