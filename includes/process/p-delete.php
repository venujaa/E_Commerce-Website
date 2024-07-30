<?php
    $h = new Helper();
    $name='';
    $msg='';
    if(isset($_POST['submit']))
    {
        $name=strtolower($_POST['name']);
        // htmlspecialchars($_POST["search_query"], ENT_QUOTES, 'UTF-8');
        
        if ($h->isEmpty(array($name)))
        {
            $msg = 'Name field is required';
        }
        else
        {
            $reader=new BlogReader();
            $products=$reader->getProductsFromDB();
            foreach ($products as $index => $innerArray) {
                // echo $products[$index]['name'];
                // echo "</br><hr>";
                    if($products[$index]['name']==$name)
                    {
                        if(isset($_SESSION['is_Sadmin']))
                        {
                            $Sadmin=new SuperAdmin($_SESSION['email']);
                            $Sadmin->deleteProductDB($name);
                            $Sadmin->deleteImageDB($name);
                            $msg='Product deleted successfully';
                            break;
                        }
                        else if(isset($_SESSION['is_Admin']))
                        {
                            $admin=new Admin($_SESSION['email']);
                            $admin->deleteProductDB($name);
                            $admin->deleteImageDB($name);
                            $msg='Product deleted successfully';
                            break;
                        }
                    }
                    else
                    {
                        $msg='Not found';
            
                    }
                   
                
            }
           
        }
    }
    