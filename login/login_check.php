<?php
include_once '../connection/database.php';


$ussername = $_POST['first_name'];
$password = $_POST['pass'];



   $ime = $pdo->prepare('SELECT * FROM users WHERE (username = ?)AND(password = ?)');
   $ime->execute([$ussername, $password]);
   $nevemvec = $ime->fetch();
   foreach ($ime as $row)
   echo $row['name'];
             die();
   if(isset($nevemvec) > 0){
            if(!isset($_COOKIE[$cookie_login])>0){
                
                  setcookie($cookie_login, $cookie_value,time() + (10*999999),"/");
                  header('Location: ../index.php');
            } 

        }
              
              
            header('Location: ./login.php?id=1');
            
        
