<?php
    session_start();
    session_destroy();
    include "UI_include.php";
    include INC_DIR.'header.html';

?>

<body>
    <div class="logoutsuccess">
        <div class="card read-card">
            <section>
            <div class="card-body">
                <p>You have logged out successfully</p>
                    <?php if (isset($_GET['admin'])): ?>
                    <div><a href = 'admin.php'>Click here to log in again</a></div>
                     <?php elseif(isset($_GET['Sadmin'])): ?>
                    <div><a href = 'superAdmin.php'>Click here to log in again</a></div> 
                    <?php else: ?>
                    <div><a href = 'login.php'>Click here to log in again</a></div>
                    <?php endif; ?>

            </div>
            </section>
            
        </div>

    </div>

    <style>

.logoutsuccess{
    color: dimgrey;
    text-align: center;
    font-size: 95%;
}
        .logoutsuccess .card-body{
    background: rgba(255, 255, 255, 0.2);
    position: relative;
    max-width: 700px;
    padding: 50px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);

}

.logoutsuccess section{
    padding: 0 100px;
    background: url(images/bg9.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    height: 100vh;
    display: flex;
    align-items: center;
}

.logoutsuccess .card-body p{
    margin: 0 0 20px;
    padding: 0;
    font-size: 38px;
    text-transform: uppercase;
    color: #044463;
}

.logoutsuccess .card-body a{
    font-size: 20px;
    color: #d5eefb;
}


    </style>
</body>
</html>                            


