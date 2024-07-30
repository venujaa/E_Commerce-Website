<?php
    session_start();
    include "UI_include.php";

    if(isset($_POST['password_rest_link']))
    {
        $email=$_POST['email'];
        $token=md5(rand());

        $member=new BlogMember($email,"","");
        $check_email=$member->getUserFromDB();

        if(isset($check_email))
        {
            $get_name=$check_email['username'];
            $get_email=$check_email['email'];

            $member->UpdateVerifyToken($get_email,$token);
            $member->send_password_reset($get_email,$get_name,$token);
            $_SESSION['status']="We e-mailed you a password reset link";
            header("Location:password-reset.php");
            exit(0);

        }
        else
        {
            $_SESSION['status']="No Email Found";
            header("Location:password-reset.php");
            exit(0);
        }
    }


    if(isset($_POST['password_update']))
    {
        $email=$_POST['email'];
        $new_password=$_POST['new_password'];
        $confirm_password=$_POST['confirm_password'];
        $token=$_POST['password_token'];

        if(!empty($token))
        {
            if(!empty($email) && !empty($new_password) && !empty($confirm_password))
            {
                $member=new BlogMember($email,"","");
                $check_token=$member->verifyToken($token);

                if($check_token)
                {
                    if($new_password==$confirm_password)
                    {
                        $member-> UpdatePassword($new_password,$token);
                        // $member->UpdateVerifyToken($email,$token);
                        $_SESSION['status']="New Password Successfully Updated";
                        header("Location:login.php");
                        exit(0);

                    }
                    else
                    {
                        $_SESSION['status']="New Password and confirm Password does not match";
                        header("Location:password-change.php?token=$token&email=$email");
                        exit(0);
                    }
                }
                else
                {
                    $_SESSION['status']="Invalid Token";
                    header("Location:password-change.php?token=$token&email=$email");
                    exit(0);
                }

            }
            else
            {
                $_SESSION['status']="All Filed are mendetory";
                header("Location:password-change.php?token=$token&email=$email");
                exit(0);
            }
        }
        else
        {
            $_SESSION['status']="No Token Available";
            header("Location:password-reset.php");
            exit(0);
        }

    }
?>