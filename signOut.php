<?php
    session_start();
    include "UI_include.php";
    include INC_DIR.'header.html';
?>
<body>
        <nav>
            <div class="nav-left">
            <h3 class="logo">LUCKY Mobiles</h3>
            </div>
        </nav>
        <div class="py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h2><i class="fa-solid fa-face-sad-tear"></i></h2>
                            </div>
                            <div class="card-body1 p-4">
                                <form action="" method="POST">
                                    <div class="form-group mb-3">
                                        <!-- <label>Email Address</label>
                                        <input type="text" name="email" class="form-control" placeholder="Enter Email Address"> -->
                                        <p>Do you want to sign Out?</p>
                                    </div>
                                    <div class="form-group mb-3">
                                        <button type="submit" name="Yes" class="btn btn-primary">Yes</button>
                                        <button type="submit" name="No" class="btn btn-primary">No</button>
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
<?php
    if(isset($_POST['Yes']))
    {
        $member=new BlogMember($_SESSION['email'],$_SESSION['username'],$_SESSION['phone']);
        $member->signOutUserDB();
        $member->DeleteOrdersDB();
        session_destroy();
        header("Location: index.php");

    }
    else if(isset($_POST['No']))
    {
        header("Location: index.php");
    }
?>
