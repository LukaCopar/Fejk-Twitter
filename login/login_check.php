<?php
include_once '../connection/database.php';


$ussername = $_POST['first_name'];
$password = $_POST['pass'];



   $ime = $pdo->prepare('SELECT * FROM users WHERE (username = ?)AND(password = ?)');
   $ime->execute([$ussername, $password]);
   $nevemvec = $ime->rowcount();
   if($nevemvec == 1){
            if(!isset($_COOKIE[$cookie_login])>0){
                $cookie_value = $ussername;
                
                  setcookie($cookie_login, $cookie_value,time() + (10*999999),"/");
                  header('Location: ../index.php');
                  die();
            } 

        }else{
              
              
            header('Location: ./login.php?id=1');
        }
        
