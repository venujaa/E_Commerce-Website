<?php
session_start();
include "UI_include.php";

if(isset($_GET['token']))
{
    $token=$_GET['token'];
    $member=new BlogMember('','','');
    $result=$member->verifyToken($token);

    if($result)
    {
        if($result['verify_status']=="0")
        {
            $clicked_token=$result['verify_token'];
            $member->UpdateVerifyStatus($clicked_token);
            $_SESSION['staus']="Your Account has been verified Successfully.!";
            header("Location:login.php");
            exit(0);

        }
        else
        {
            $_SESSION['staus']="Email Already Verified. Please Login";
            header("Location:login.php");
            exit(0);
        }
    }
    else
    {
        $_SESSION['staus']="This token does not exists";
        header("Location:login.php");
    }
}
else
{
    $_SESSION['staus']="Not Allowed";
    header("Location:login.php");
}