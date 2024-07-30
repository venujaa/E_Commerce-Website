<?php
    $h = new Helper();
    $name='';
    $description='';
    $price='';
    $msg='';
    $filePath='';
    
    if(isset($_POST['submit']))
    {   
        // $name=$_POST['name'];
        $name=strtolower($_POST['name']);
        $description=$_POST['description'];
        $price=$_POST['price'];
        
        //image uploading
        $img_name=$_FILES['img_upload']['name'];
        $tmp_img_name=$_FILES['img_upload']['tmp_name'];
        $folder='upload/';
        $filePath =$folder.$img_name;
        move_uploaded_file($tmp_img_name,$filePath);
        
        if ($h->isEmpty(array($name,$description, $price)))
        {
            $msg = 'All fields are required';
        }
        else
        {
            if(isset($_SESSION['is_Sadmin']))
            {
                $Sadmin=new SuperAdmin($_SESSION['email']);
                $result1=$Sadmin->insertIntoImageDB($name,$filePath);
                $result2=$Sadmin->insertIntoProductDB($name,$description,$price);
                if($result2)
                {
                    
                    $msg=$result2;
                    
                }
                else
                {
                    $msg='Product added successfully';
                }
                
                
            }
            else if(isset($_SESSION['is_Admin']))
            {
                $admin=new Admin($_SESSION['email']);
                $result1=$admin->insertIntoImageDB($name,$filePath);
                $result2=$admin->insertIntoProductDB($name,$description,$price);
                if($result2)
                {
                    
                    $msg=$result2;
                    
                }
                else
                {
                    $msg='Product added successfully';
                }
            }
        }
    }
    
   
