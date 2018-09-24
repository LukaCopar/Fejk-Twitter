<?php

include_once '../connection/database.php';

$name = $_POST['name'];
$surname = $_POST['surname'];
$ussername = $_POST['username'];
$email = $_POST['e-mail'];
$pass1 = $_POST['pass'];
$pass2 = $_POST['pass2'];
$county = $_POST['country']; 
$birthday = $_POST['birthday'];
echo $name. $surname. $ussername. $email. $pass1. $pass2. $county, $birthday;
$profileurl = "asd";

if($pass1 != $pass2){
     header("Location: ./register.php?id=1");
}else{

        
if(!empty($name) && !empty($surname) && !empty($pass1) && !empty($email)  ){
$lol = $pdo->prepare("INSERT INTO `users`(`country_id`, `name`, `surname`, `password`, `username`, `profile_pic_URL`, `birthday`) VALUES (?,?,?,?,?,?,?)");
    $lol->execute([$county, $name, $surname, $pass1, $ussername, $profileurl, $birthday]);
     header("Location: ../login/login.php");

   
   }else
    header("Location: ./register.php");
}
   
   