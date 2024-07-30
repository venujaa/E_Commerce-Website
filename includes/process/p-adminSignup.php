<?php
    $h = new Helper();
    $msg = '';
    $email='';
    $username = '';
    $phone='';

    if(isset($_POST['submit']))
    {
        $email=$_POST['email'];
        $username=$_POST['username'];
        $phone=$_POST['phonenumber'];
        $verify_token=md5(rand());
        if($h->isEmpty(array($email,$_POST['password'],$username,$phone)))
        {
            $msg = 'All fields are required'; 
        }
        else if(!$h->isValidLength($_POST['password']))
        {
            $msg = 'Password must be between 8 and 20 characters';
        }
        else if (!$h->isSecure($_POST['password'])){
            $msg = 'Password must contain at least one lowercase character, one uppercase character and one digit';
        }
        else if(!$h->isValidateEmailAddress($email))
        {
            $msg='Email must be in correct format';
        }
        else if(!$h->isValidatePhoneNumber($phone))
        {
            $msg='Phone number must be in SL format';
        }
        else if(!$h->passwordsMatch($_POST['password'],$_POST['ConfirmPassword']))
        {
            $msg='Password not match';
        }
        else
        {
            $member = new BlogMember($email,$username,$phone);

            if($member->isDuplicateEmail())
            {
                $msg = "Email already in use";
            }
            else
            {   
                
                $member->sendemail_verify($verify_token);
                $member->insertAdminIntoUserDB($_POST['password'],$verify_token);
                $msg = "Admin Account Created Successfully";
                
            }
        }
    }
