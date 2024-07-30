<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require 'vendor/autoload.php';
    class BlogMember extends BlogReader
    {
        private $email;
        private $username;
        private $phone;
        
        public function __construct($pEmail,$pUsername,$pPhone)
        {
            parent::__construct();
            $this->email=$pEmail;
            $this->username=$pUsername;
            $this->phone=$pPhone;
            $this->type=BlogMember::MEMBER;
        }

        public function isDuplicateEmail()
        {
            $sql="SELECT count(email) AS num FROM user WHERE email=:email";

            $values=array(
                array(':email',$this->email)
            );

            $result=$this->db->queryDB($sql,Database::SELECTSINGLE, $values);

            if($result['num']==0)
            {
                return false;
            }
            else
            {
                return true;
            }
        }
        public function isOneSuperAdmin()
        {   
            $is_Admin=true;
            $sql="SELECT count(email) AS num FROM user WHERE is_Sadmin= $is_Admin";

            $values=array(
                array(':email',$this->email)
            );

            $result=$this->db->queryDB($sql,Database::SELECTSINGLE, $values);

            if($result['num']>0)
            {
                return false;
            }
            else
            {
                return true;
            }

        }
        public function insertIntoUserDB($pPassword,$verify_token)
        {
            
            $sql="INSERT INTO user (email,password,username,phone,verify_token) VALUES (:email,:password,:username,:phone,:verify_token)";
            
            $values=array(
                array(':email',$this->email),array(':password',password_hash($pPassword,PASSWORD_DEFAULT)),array(':username',$this->username),array(':phone',$this->phone),
                array(':verify_token',$verify_token));

            $this->db->queryDB($sql,Database::EXECUTE,$values);
        }

        public function insertAdminIntoUserDB($pPassword,$verify_token)
        {
            $is_Admin=true;
            $sql="INSERT INTO user (email,password,username,phone,is_Admin,verify_token) VALUES (:email,:password,:username,:phone,$is_Admin,:verify_token)";
            
            $values=array(
                array(':email',$this->email),array(':password',password_hash($pPassword,PASSWORD_DEFAULT)),array(':username',$this->username),array(':phone',$this->phone),array(':verify_token',$verify_token)
            );

            $this->db->queryDB($sql,Database::EXECUTE,$values);
        }

        public function insertSuperAdminIntoUserDB($pPassword)
        {
            $is_Sadmin=true;
            $sql="INSERT INTO user (email,password,username,phone,is_Sadmin) VALUES (:email,:password,:username,:phone,$is_Sadmin)";
            
            $values=array(
                array(':email',$this->email),array(':password',password_hash($pPassword,PASSWORD_DEFAULT)),array(':username',$this->username),array(':phone',$this->phone)
            );

            $this->db->queryDB($sql,Database::EXECUTE,$values);
        }

        public function isValidLogin()//$pPassword
        {
            $sql="SELECT password,verify_status FROM user WHERE email=:email";

            $values=array(array(':email',$this->email));

            $result=$this->db->queryDB($sql,Database::SELECTSINGLE,$values);
            
            if($result)//count($result)==0
            {
                return $result;
            }
            else
            {
                return false;
            }
            // if(isset($result['password']) && password_verify($pPassword,$result['password']) && $result['verify_status']=="1")
            // {
            //     return true;
            // }
            // else
            // {
            //     return false;
            // }
        }
        public function getUserFromDB()
        {
            $sql="SELECT * FROM user Where email=:email";
    
            $values=array(array(':email',$this->email));
    
            $result=$this->db->queryDB($sql,Database::SELECTSINGLE,$values);
    
            if($result) //if(count($result)==0)
            {
                return $result;
            }
            else
            {
                return false;
            }
    
        }
        
        public function sendemail_verify($verify_token)
        {
            $mail = new PHPMailer(true);

            // $mail->SMTPDebug = 2; //2SMTP::DEBUG_SERVER
            $mail->isSMTP();
            $mail->SMTPAuth   = true;

            $mail->Host       = 'smtp.gmail.com';
            $mail->Username   = 'tharsikan650@gmail.com';                     //SMTP username
            $mail->Password   = 'kcidvznokomcjejh';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS ;   //'tls'"PHPMailer::ENCRYPTION_SMTPS"         //Enable implicit TLS encryption
            $mail->Port       = 465 ;//587

            $mail->setFrom('tharsikan650@gmail.com',$this->username);
            $mail->addAddress($this->email);

            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Email verification from LUCKEY mobile';

            $email_templete="
                    <h2>You have Register with LUCKY mobiles</h2>
                    <h5>Verify your email address to login with the below given link</h5>
                    <br/><br/>
                     <a href='http://localhost/finalProject/verify-email.php?token=$verify_token'>Click Here to verify</a>
            
            ";

            $mail->Body =$email_templete;
            $mail->send();
            // echo "<h5>Message has been sent</h5>";

        }

        public function resend_email_verify($name,$Email,$Verify_token)
        {
            $mail = new PHPMailer(true);

            // $mail->SMTPDebug = 2; //2SMTP::DEBUG_SERVER
            $mail->isSMTP();
            $mail->SMTPAuth   = true;

            $mail->Host       = 'smtp.gmail.com';
            $mail->Username   = 'tharsikan650@gmail.com';                     //SMTP username
            $mail->Password   = 'kcidvznokomcjejh';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS ;   //'tls'"PHPMailer::ENCRYPTION_SMTPS"         //Enable implicit TLS encryption
            $mail->Port       = 465 ;//587

            $mail->setFrom('tharsikan650@gmail.com',$name);
            $mail->addAddress($Email);

            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Resend Email verification from LUCKY mobile';

            $email_templete="
                    <h2>You have Register with LUCKY mobiles</h2>
                    <h5>Verify your email address to login with the below given link</h5>
                    <br/><br/>
                     <a href='http://localhost/finalProject/verify-email.php?token=$Verify_token'>Click Here to verify</a>
            
            ";

            $mail->Body =$email_templete;
            $mail->send();
        }

        public function send_password_reset($get_email,$get_name,$token)
        {
            $mail = new PHPMailer(true);

            // $mail->SMTPDebug = 2; //2SMTP::DEBUG_SERVER
            $mail->isSMTP();
            $mail->SMTPAuth   = true;

            $mail->Host       = 'smtp.gmail.com';
            $mail->Username   = 'tharsikan650@gmail.com';                     //SMTP username
            $mail->Password   = 'kcidvznokomcjejh';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS ;   //'tls'"PHPMailer::ENCRYPTION_SMTPS"         //Enable implicit TLS encryption
            $mail->Port       = 465 ;//587

            $mail->setFrom('tharsikan650@gmail.com',$get_name);
            $mail->addAddress($get_email);

            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Reset Password Notification';

            $email_templete="
                    <h2>Hello</h2>
                    <h5>You are receving this email because we received a password reset request for your account.</h5>
                    <br/><br/>
                     <a href='http://localhost/finalProject/password-change.php?token=$token&email=$get_email'>Click Here to verify</a>
            
            ";

            $mail->Body =$email_templete;
            $mail->send();
        }

        public function verifyToken($token)
        {
            $sql="SELECT verify_token,verify_status FROM user WHERE verify_token=:verify_token LIMIT 1";
            $values=array(array(':verify_token',$token));
            $result=$this->db->queryDB($sql,Database::SELECTSINGLE,$values);
    
            if($result)
            {
                return $result;
            }
            else
            {
                return false;
            }
        }

        public function UpdateVerifyStatus($clicked_token)
        {
            $sql="UPDATE user SET verify_status='1' WHERE verify_token=:verify_token LIMIT 1";
            $values=array(array(':verify_token',$clicked_token));
            $this->db->queryDB($sql,Database::EXECUTE,$values);
        }

        public function UpdateVerifyToken($get_email,$token)
        {
            $sql="UPDATE user SET verify_token=:verify_token WHERE email=:email LIMIT 1";
            $values=array(array(':verify_token',$token),array(':email',$get_email));
            $this->db->queryDB($sql,Database::EXECUTE,$values);
        }

        public function UpdatePassword($new_password,$token)
        {
            $sql="UPDATE user SET password =:password WHERE verify_token=:verify_token LIMIT 1";
            $values=array(array(':password',password_hash($new_password,PASSWORD_DEFAULT)),array(':verify_token',$token));
            $this->db->queryDB($sql,Database::EXECUTE,$values);
        }

        public function InsertOrderDB($email,$product,$customer,$location,$amount)
        {
            $sql="INSERT INTO orders (email,product,customer,location,amount) VALUES (:email,:product,:customer,:location,:amount)";
            
            $values=array(
                array(':email',$email),array(':product',$product),array(':customer',$customer),array(':location',$location),array(':amount',$amount));

            $this->db->queryDB($sql,Database::EXECUTE,$values);
        }

        public function signOutUserDB()
        {
            $sql="DELETE FROM user WHERE email=:email";
            $values=array(
                array(':email',$this->email));

            $this->db->queryDB($sql,Database::EXECUTE,$values);

        }
        public function DeleteOrdersDB()
        {
            $sql="DELETE FROM orders WHERE email=:email";
            $values=array(
                array(':email',$this->email));

            $this->db->queryDB($sql,Database::EXECUTE,$values);

        }
        public function InsertReviewDB($reviewer,$email,$message)
        {
            $sql="INSERT INTO reviews (name,email,message) VALUES (:name,:email,:message)";
            
            $values=array(
                array(':name',$reviewer),array(':email',$email),array(':message',$message));

            $this->db->queryDB($sql,Database::EXECUTE,$values);
        }

        public function sendemail_to_customer()
        {
            $mail = new PHPMailer(true);

            // $mail->SMTPDebug = 2; //2SMTP::DEBUG_SERVER
            $mail->isSMTP();
            $mail->SMTPAuth   = true;

            $mail->Host       = 'smtp.gmail.com';
            $mail->Username   = 'tharsikan650@gmail.com';                     //SMTP username
            $mail->Password   = 'kcidvznokomcjejh';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS ;   //'tls'"PHPMailer::ENCRYPTION_SMTPS"         //Enable implicit TLS encryption
            $mail->Port       = 465 ;//587

            $mail->setFrom('tharsikan650@gmail.com',$this->username);
            $mail->addAddress($this->email);

            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Email verification to the cutomer from LUCKEY mobile';

            $email_templete="
                    <h2>You have ordered from LUCKY mobiles</h2>
                    <h5>Thank you for ordering</h5>
                    <br/><br/>
                     <a href='http://localhost/finalProject/login.php'>Click Here to check your order </a>
            
            ";

            $mail->Body =$email_templete;
            $mail->send();
            // echo "<h5>Message has been sent</h5>";

        }
        
        
    }



