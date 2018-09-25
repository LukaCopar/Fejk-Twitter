<?php
include_once '../connection/database.php';

$id = $_GET['id'];
$username = $_GET['username'];



   $ime = $pdo->prepare('SELECT * FROM users WHERE authentication_token = ?');
   $ime->execute([$id]);
   $nevemvec = $ime->rowcount();
   if($nevemvec == 1){
            if(!isset($_COOKIE[$cookie_login])>0){
                $cookie_value = $username;
                
                  setcookie($cookie_login, $cookie_value,time() + (10*999999),"/");
                  header('Location: ../index.php?users=0');
                  
            } 

        }else{
            
          
        }
        
