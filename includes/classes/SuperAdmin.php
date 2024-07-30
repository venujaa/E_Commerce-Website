<?php

class SuperAdmin
{
    private $db;
    private $email;
    // private $username;
    // private $phone;

    public function __construct($pEmail)
    {   
        // $pUsername,$pPhone eduthiddan
        $this->db=new Database();
        $this->email=$pEmail;
        // $this->username=$pUsername;
        // $this->phone=$pPhone;
    }

    // public function isValidLogin($pPassword)
    // {
    //     $sql="SELECT password FROM user WHERE email=:email AND is_Sadmin=true";

    //     $values=array(array(':email',$this->email));

    //     $result=$this->db->queryDB($sql,Database::SELECTSINGLE,$values);

    //     if(isset($result['password']) && password_verify($pPassword,$result['password']))
    //         {
    //             return true;
    //         }
    //         else
    //         {
    //             return false;
    //         }
    // }
    public function isValidLogin()
    {
        $sql="SELECT password,verify_status FROM user WHERE email=:email AND is_Sadmin=true";

        $values=array(array(':email',$this->email));

        $result=$this->db->queryDB($sql,Database::SELECTSINGLE,$values);
        if(count($result)==0)
        {
            return false;
        }
        else
        {
            return $result;
        }

        // if(isset($result['password']) && password_verify($pPassword,$result['password']))
        //     {
        //         return true;
        //     }
        //     else
        //     {
        //         return false;
        //     }
    }

    public function insertIntoProductDB($name,$description,$price){
        try{
            $sql="INSERT INTO product (name,description,price) VALUES (:name,:description,:price)";

        $values=array(array(':name',$name),array(':description',$description),array(':price',$price));

        $this->db->queryDB($sql,Database::EXECUTE, $values);
        }
        catch(PDOException $e)
        {
            if ($e->getCode() == '23000') {
                // Duplicate entry error code (this may vary depending on your database)
                // Handle the duplicate product name error
                return "Error: Product with the same name already exists.";
            } 
        }
        
        
    }

    public function insertIntoImageDB($name,$location){
        try{
            $sql="INSERT INTO image (name,location) VALUES (:name,:location)";

            $values=array(array(':name',$name),array(':location',$location));
    
            $this->db->queryDB($sql,Database::EXECUTE, $values);
        }
        catch(PDOException $e)
        {
            if ($e->getCode() == '23000') {
                // Duplicate entry error code (this may vary depending on your database)
                // Handle the duplicate product name error
                return "Error: Product with the same image already exists.";
            } 
        }
       
    }
    
    public function deleteProductDB($name)
    {
        $sql="DELETE FROM product WHERE name=:name";
        $values=array(array(':name',$name));
        $this->db->queryDB($sql,Database::EXECUTE, $values);
    }
    public function deleteImageDB($name)
    {
        $sql="DELETE FROM image WHERE name=:name";
        $values=array(array(':name',$name));
        $this->db->queryDB($sql,Database::EXECUTE, $values);
    } 
    // public function imageUpload()
    // {
    //     //image uploading
    //     $img_name=$_FILES['img_upload']['name'];
    //     $tmp_img_name=$_FILES['img_upload']['tmp_name'];
    //     $folder='upload/';
    //     move_uploaded_file($tmp_img_name,$folder.$img_name);
        
    //     $filePath = mysqli_real_escape_string($this->db, $folder.$tmp_img_name);
    //     return $filePath;
    // }
}
