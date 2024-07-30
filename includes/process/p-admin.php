<?php
    $h = new Helper();
    $msg = '';
    $email='';

    if(isset($_POST['submit']))
    {
        $email=$_POST['email'];

        if ($h->isEmpty(array($email, $_POST['password'])))
        {
            $msg = 'All fields are required';     
        }
        else
        {
            $admin=new Admin($email);
            $result= $admin->isValidLogin();
            
            if (!$result)
            {
                $msg = "Invalid email or Password";
                
            }
            else
            {   
                if(isset($result['password']) && password_verify($_POST['password'],$result['password'])&& $result['verify_status']=="1")
                {
                    $_SESSION['email']=$email;
                    $_SESSION['is_Admin']=true;
                    header("Location: write.php");
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
