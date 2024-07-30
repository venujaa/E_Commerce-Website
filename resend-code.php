<?php
session_start();
include "UI_include.php";
if(isset($_POST['resend_email_verify_btn']))
{
    if(!empty(trim($_POST['email'])))
    {   
        $email=$_POST['email'];
        $member=new BlogMember($email,'','');
        $result=$member->getUserFromDB();
        if(!$result)
        {
            $_SESSION['status']="Email is not registered. Please Register now..!";
            header("Location:signup.php");
            exit(0);
        }
        else
        {
            if($result['verify_status']=="0")
            {
                $name=$result['name'];
                $email=$result['email'];
                $verify_token=$result['verify_token'];

                $member->resend_email_verify($name,$email,$verify_token);
                $_SESSION['status']="Verification Email link has been sent to your email address.!";
                header("Location:login.php");
                exit(0);
            }
            else
            {
                $_SESSION['status']="Email is already verified. Please Login..!";
                header("Location:login.php");
                exit(0);
            }
        }
    }
    else
    {
        $_SESSION['status']="please enter the email field";
        header("Location:resend-email-verification.php");
        exit(0);
    }
}
?>