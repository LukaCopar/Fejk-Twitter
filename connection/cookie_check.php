<?php
include_once './session.php';

$cookie_login = "login_cookie";


$login = $_COOKIE[$cookie_login];

if($login != $_SESSION['username']){
    setcookie($cookie_login,$cookie_value1, time() - 3600,"/");
    header('Location: ../Fejk-Twitter/LogOut.php');
    
}

if(isset($login)>0){
   
}else{
    
    header('Location: Fejk-Twitter/login/login.php');
}

