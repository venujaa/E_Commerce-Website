<?php

    $h = new Helper();
    $msg = '';
    $email = '';
    $username='';
    $phone='';
    if (isset($_POST['submit']))
    {        
        $email = $_POST['email'];               

        if ($h->isEmpty(array($email, $_POST['password'])))
        {
            $msg = 'All fields are required';     
        }
        else
        {
            $member = new BlogMember($email,$username,$phone);
           
            $result=$member->isValidLogin();
            
            if (!$result)
            {
                $msg = "Invalid email or Password";
                
            }
            else
            {   
                if(isset($result['password']) && password_verify($_POST['password'],$result['password'])&& $result['verify_status']=="1")
                {
                        $result1=$member->getUserFromDB($email);
                        $_SESSION['email'] =$result1['email'];
                        $_SESSION['username']=$result1['username'];
                        $_SESSION['phone']=$result1['phone'];
                        $_SESSION['is_Admin']=$result1['is_Admin'];
                        $_SESSION['is_Sadmin']=$result1['is_Sadmin'];
                        header("Location: index.php"); 
                }
                else if($result['verify_status']=="0"&& isset($result['password']) && password_verify($_POST['password'],$result['password']))
                {
                    $msg ="please verify your email address to login";
                }
                else
                {
                    $msg = "Invalid email or Password";
                }
                

                               
            }


        }
            
    }