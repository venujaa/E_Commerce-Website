<?php    

    $h = new Helper();

    $is_member=isset($_SESSION['email']);

    if ($is_member){
        $reader = new BlogMember($_SESSION['email'],'','');
    }
    else
    {
        $reader=new BlogReader();
    }

    $products=$reader->getProductsFromDB();
    $images=$reader->getImagesFromDB();
    //add to card
    if ($is_member){
    if(isset($_POST['add-toCard']))
    {
        // echo ($_POST['product-name']);
        if(isset($_SESSION['add-toCard'])){
            $item_array_name=array_column($_SESSION['add-toCard'],"product-name");
            // print_r( $item_array_name);

            if(in_array($_POST['product-name'],$item_array_name))
            {
                echo "<script>alert('Product is already added in the card..!')</script>";
                echo "<script>window.location='index.php'</script>";
            }
            else
            {
                $count=count($_SESSION['add-toCard']);

                $item_array=array('product-name'=>$_POST['product-name']);

                $_SESSION['add-toCard'][$count]=$item_array;

                //  print_r($_POST['product-name']);
            }
        }
        else
        {
            $item_array=array("product-name"=>$_POST['product-name']);

            //create new session variable
            $_SESSION['add-toCard'][0]=$item_array;
            // print_r($_SESSION['add-toCard']);
            // print_r($_POST['product-name']);
            
        }
    }
    }
    // else
    // {
    //     if(isset($_SESSION['add-toCard'])){
    //         echo "<script>alert('please sigup..!')</script>";
    //         echo "<script>window.location='index.php'</script>";
    //     }
       
    // }
    if($products==false||$images==false)
    {

        include "output_code/blankcard.html";
    }
    else
    {
        echo '<div class="card read-card">';
        echo '<div class="card-body">';
        foreach($products as $result)
        {   
            foreach($images as $image)
            {
                if($result['name'] == $image['name'])
                {
                    $Pname=htmlspecialchars($result['name']);
                    $Pdescription=htmlspecialchars($result['description']);
                    $Pprice=htmlspecialchars($result['price']);

                    $Plocation = $image['location'];

                    include "output_code/messagecard.php";
                    break;
                }
                
            }
            

        }
        echo '</div>';
        echo '</div>';
    }
    
    // if ($is_member)
    // {
        
    //     include "output_code/logout.html";
        
    // }

    