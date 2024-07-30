<?php
if(isset($_POST['submit']))
{
    $reviewer=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];
    // echo $_POST['name'];
    $member = new BlogMember('','','');
    
    $member->InsertReviewDB($reviewer,$email,$message);
    header("Location:index.php");
    
}
?>