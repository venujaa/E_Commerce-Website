<?php

// ------------------------------step1:-connect the database--------------------------------------------------- 

$pdo1= new PDO("mysql:host=localhost;dbname=abc", "VENUJA", "2000");
$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

//-----------------------Step2:- create user Table------------------------------------------------------------
// $sql1="CREATE TABLE user(
//     email VARCHAR(225) PRIMARY KEY,
//     password VARCHAR(225),
//     username VARCHAR(225),
//     phone VARCHAR(12) ,
//     is_Admin BOOLEAN DEFAULT NULL,
//     is_Sadmin BOOLEAN DEFAULT NULL
// )";

// $stmt1=$pdo1->prepare($sql1);
// $stmt1->execute();

//-------------------------step3:- create image Table----------------------------------------------------

// $sql2="CREATE TABLE image(
// name VARCHAR(225) PRIMARY KEY,
// location VARCHAR(225)
// )";
// $stmt2=$pdo1->prepare($sql2);
// $stmt2->execute();

//--------------------------step4:- create product Table----------------------------------------------------

// $sql3="CREATE TABLE product (
//     name VARCHAR(225) PRIMARY KEY,
//     description TEXT,
//     price DECIMAL(10,2),
//     FOREIGN KEY (name) REFERENCES image(name)
// )";
// $stmt3=$pdo1->prepare($sql3);
// $stmt3->execute();

//----------------------------step5:-Insert Super Admin in th database--------------------------------

$password = password_hash('Tharsikan2', PASSWORD_DEFAULT);
$sql4 = "INSERT INTO user (email, password, username, phone, is_Sadmin) VALUES ('tharsikan2@gmail.com', :password, 'Tharsikan2', '0762354785', true)";

$stmt4 = $pdo1->prepare($sql4);
$stmt4->bindParam(':password', $password, PDO::PARAM_STR);
$stmt4->execute();

?>