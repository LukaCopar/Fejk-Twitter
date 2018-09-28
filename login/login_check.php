<?php
include_once '../connection/database.php';

if(isset($_POST['first_name']) && isset($_POST['pass']) > 0){
$ussername = $_POST['first_name'];
$password = $_POST['pass'];
}else{
    $ussername = $_GET['first_name'];
$password = $_GET['pass'];
    
}




   $ime = $pdo->prepare('SELECT * FROM users WHERE (username = ?)AND(password = ?)');
   $ime->execute([$ussername, $password]);
   $nevemvec = $ime->rowcount();
   if($nevemvec == 1){
            if(!isset($_COOKIE[$cookie_login])>0){
                $cookie_value = $ussername;
                
                  setcookie($cookie_login, $cookie_value,time() + (10*999999),"/");
                  header('Location: ../index.php?users=0');
                  die();
            } 

        }else{
              
              
            header('Location: ./login.php?id=1');
        }
        
