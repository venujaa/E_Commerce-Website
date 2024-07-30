<?php

class BlogReader{

    const READER = 1;
    const MEMBER = 2;
    
    protected $db;
    protected $type;

    public function __construct(){
        
        $this->db = new Database();
        $this->type = BlogReader::READER;
    }    
    
    //Add getProductsFromDB() here
    public function getProductsFromDB()
    {
        $sql="SELECT * FROM product";

        $result=$this->db->queryDB($sql,Database::SELECTALL);

        if(count($result)==0)
        {
            return false;
        }
        else
        {
            return $result;
        }
    }
    // public function getImagesFromDB($name)
    // {
    //     $sql="SELECT * FROM image WHERE name=$name";

    //     $result=$this->db->queryDB($sql,Database::SELECTSINGLE);

    //     if(count($result)==0)
    //     {
    //         return false;
    //     }
    //     else
    //     {
    //         return $result;
    //     }
    // }
    public function getImagesFromDB()
    {
        $sql="SELECT * FROM image";

        $result=$this->db->queryDB($sql,Database::SELECTALL);

        if(count($result)==0)
        {
            return false;
        }
        else
        {
            return $result;
        }
    }
    public function getOrderFromDB()
    {
         $sql="SELECT * FROM orders";
         $result=$this->db->queryDB($sql,Database::SELECTALL);

         if(count($result)==0)
         {
             return false;
         }
         else
         {
             return $result;
         }
    }

    public function getCustomerOrderFromDB($email)
    {
        $sql="SELECT * FROM orders Where email=:email";
    
            $values=array(array(':email',$email));
    
            $result=$this->db->queryDB($sql,Database::SELECTALL,$values);
            // if(count($result)==0)
            // {
            //     return false;
            // }
            // else
            // {
            //     return $result;
            // }
            if($result)
            {
                return $result;
            }
            else
            {
                return false;
            }
    }

    public function getReviewFromDB()
    {
        $sql="SELECT * FROM reviews";
        $result=$this->db->queryDB($sql,Database::SELECTALL);
        if($result)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }
    
}
