<?php

    session_start();
    include "UI_include.php";
    include INC_DIR."/process/p-storeReview.php";
    include INC_DIR.'header.html';

?>    
    
    <body>
    
        <nav>
            <div class="nav-left">
            <h3 class="logo">LUCKY Mobiles</h3>
            <ul>
                <li>
                <?php
                    if(isset($_SESSION['is_Sadmin']) || isset($_SESSION['is_Admin']))
                    {
                        
                        echo '<a href="write.php">Add product</a>';
                    }
                    else if(isset($_SESSION['email']))/////////////////////////////////////////////
                    {                                             ///
                        echo '<a href="UserOrder.php">Your Orders</a>'; ///
                    }                                             ///
                    /////////////////////////////////////////////////
                ?>
                </li>
                <li>
                <?php
                    if(isset($_SESSION['is_Sadmin']) || isset($_SESSION['is_Admin']))
                    {
                        
                        echo '<a href="delete.php">Delete product</a>';
                    }
                ?>
                </li>
                <li>
                <?php
                    if(isset($_SESSION['is_Sadmin']) || isset($_SESSION['is_Admin']))
                    {
                        
                        echo '<a href="order.php">Orders</a>';
                    }
                ?>
                </li>
               <li>
                <?php
                    if(isset($_SESSION['is_Sadmin']))
                    {
                        echo '<a href = "adminSignup.php">Sign Up Admin</a>';
                    }
                ?>
               </li>
                <li>
                    <?php
                        if(!isset($_SESSION['email']))
                        {
                            echo '<a href="login.php">Log in</a>';
                        }
                    ?>    

                </li>
                <li>
                    <?php
                        if(!isset($_SESSION['email']))
                        {
                            echo '<a href="signup.php">Sign up</a>';
                        }
                    ?>   
                    <!-- <a href="signup.php">Sign up</a> -->
                </li>
            </ul>
            </div>
            <div class="nav-right">
            <div class="Shopping-icon">
            <a href='myCard.php'>
                        <h6><i class='fa-solid fa-cart-shopping'></i></h6>
                        
            </a> 
            
            </div>
            <?php
                        if(isset($_SESSION['add-toCard']))
                        {
                            $count=count($_SESSION['add-toCard']);
                            echo "<span class='card-count'>$count</span>";
                        }
                        else
                        {
                            echo "<span class='card-count'>0</span>";
                        }
            ?>
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
                        <img src="images/profile-pic.png">
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
                        <img src="images/emailB.jpg">
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
                        <img src="images/phoneB.jpg">
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
                            echo '<img src="images/logoutB.png">';
                            echo '<a href="logout.php">Log Out</a>';
                        }
                        ?>
                    </div>
                    <div class="user-profile">
                        <?php
                        if(isset($_SESSION['email']))
                        {   
                            echo "<form action=\"signOut.php\" method=\"POST\">";
                            echo '<img src="images/signout.png">';
                            echo '<input type="submit" class="signout" name="Signout" value="Sign Out">';
                            echo "</form>";
                            
                            //echo '<a href="logout.php">Sign Out</a>';
                            
                           
                        }
                        ?>
                    </div>
                </div>
            </div>
        </nav>
        <div class="searchBar">
            <input type="text" class="search-bar " id="search-bar" placeholder="Search for Products" name="search-bar" aria-label="Search" title="Search for products" required onkeyup="search()">
            <i class="fa-solid fa-magnifying-glass glass"></i>
        </div> 
        
        <?php
        
        
            include INC_DIR."/process/p-read.php";
            
        ?>
        <!-- ////////////////////////////////////////// -->
        <section class="contact section" id="contact">
            <h2 class="section_title" data-aos="fade-down">Contact</h2>
            <div class="contact_container bd_grid">
                <form action="" method="POST" class="contact_form">
                    <!-- includes/process/p-storeReview.php -->
                    <input type="text" name="name" placeholder="Name" class="control_input" data-aos="fade-right" data-aos-delay="250">
                    <input type="mail" name="email" placeholder="Email" class="control_input" data-aos="fade-right" data-aos-delay="300">
                    <textarea name="message" id=""  cols="0" rows="10" class="control_input" data-aos="fade-right" data-aos-delay="400">
                    </textarea>

                <input type="submit" name="submit" value="Send" class="control_button button" data-aos="fade-right" data-aos-delay="450">    
                </form>
            </div>
        </section>
        <?php
        if (isset($_SESSION['email']))
        {
            
            include INC_DIR."process/output_code/logout.html";
            
        }
        ?>
        <!-- footer -->
        <footer class="footer">
            <p class="footer_title" data-aos="fade-down">Lucky Mobiles</p>
            <p class="footer_title" data-aos="fade-down">+94766413644</p>
            <div class="footer_title">
                <a href="reviews.php" class="footer_icon" data-aos="fade-down">Reviews</a>
            </div>
            <div class="footer_socials">
                <a href="https://web.facebook.com/tharsikan.simbu" class="footer_icon"><i class='bx bxl-facebook-circle' data-aos="fade-down" data-aos-delay="250"></i></a>
                <!-- <a href="https://github.com/TharsikanV" class="footer_icon"><i class='bx bxl-github' data-aos="fade-down" data-aos-delay="350" ></i></a> -->
                <a href="https://www.linkedin.com/in/tharsikan-visvalinkam-886994242/" class="footer_icon"><i class='bx bxl-linkedin' data-aos="fade-down" data-aos-delay="450"></i></a>
                <a href="https://medium.com/@tharsikan645" class="footer_icon"><i class='bx bxl-medium' data-aos="fade-down" data-aos-delay="550" ></i></a>
            </div>
            <p data-aos="fade-down" data-aos-delay="650">&#169;2023 copyright all right reserved</p>
        </footer>
        <!-- /////////////////////////////////////// -->
        

    <style>
    html{
    scroll-behavior: smooth;
    }
        /* footer */
        .footer{
    background-color: #4070f4;
    color: #fff;
    text-align: center;
    font-weight:600;
    padding: 2rem 0;
}

.footer_title{
    font: size 2rem;
    margin-bottom:2rem;
}

.footer_socials{
    margin-bottom:2rem;
}

.footer_icon{
    font-size: 1.5rem;
    color: #fff;
    margin: 0 1rem;
}
/* contact */
.control_input{
    width: 100%;
    font-size:0.938rem;
    font-weight:600;
    padding: 1rem;
    border-radius: 0.5rem;
    border: 1.5px solid #0e2431;
    outline: none;
    margin-bottom:2rem;
}
.control_button{
    display: block;
    border: none;
    outline: none;
    font-size:0.938rem;
    cursor: pointer;
    margin-left: auto;
}
.contact_form{
        width: auto;
        /* 500px 100% */
        margin-left:100px ;
        margin-right:100px ;
}

.contact_container{
    justify-items: center;
}
/* .contact {
    margin-left:500px ;
    margin-right:500px ;
} */
/* button */
.button{
    display: inline-block;
    color: #fff;
    padding: .75rem 2.5rem;
    font-weight:600;
    border-radius: 0.5rem;
    background:linear-gradient(to right,#5001fb,#8e0af3);
}

.signout{
    background-color:#056df4;
    color:#fff;
    border:2px solid #a09efc;
    outline-style:solid;
    outline-color:#0905dc;
    border-radius:5px;
}

.button:hover{
    box-shadow: 0 10px 36px rgba(0,0,0,0.15);
}

.section_title{
    position: relative;
    font-size:1.5rem;
    /* color:; */
    margin-top:1rem;
    margin-bottom:2rem;
    text-align: center;
}

.section_title::after{
    position: absolute;
    content: "";
    width: 64px;
    height: 0.18rem;
    left: 0;
    right: 0;
    margin: auto;
    top: 2rem;
    background-color:black;
}
    </style>
            <!-- javascript -->
<script>
    function search() {
        let filter = document.getElementById('search-bar').value.toUpperCase();
        let item = document.querySelectorAll('.product-card');
        let l = document.getElementsByTagName('h4');
        for(var i = 0;i<=l.length;i++){
            let a=item[i].getElementsByTagName('h4')[0];
            let value=a.innerHTML || a.innerText || a.textContent;
        if(value.toUpperCase().indexOf(filter) > -1) {
            item[i].style.display="";
        }
        else
        {
            item[i].style.display="none";
        }
        }
    }
</script>
    <script src="includes/js/script.js"></script>
    <!-- Bootstrap CSS and JS script links -->
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->

	</body>


</html>