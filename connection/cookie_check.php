<?php
$cookie_login = "login_cookie";


$login = $_COOKIE[$cookie_login];
if(isset($login)>0){
    
   
    
    
}else{
    
    header('Location: ./login/login.php');
}

