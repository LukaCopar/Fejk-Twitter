<?php
include_once '../connection/database.php';
include_once '../session.php';;
if(isset($_POST['username']) && isset($_POST['pass']) > 0){
    
$ussername = $_POST['username'];
$password = $_POST['pass'];
}else{
    
    $id = $_GET['username'];
$password = $_GET['password'];

 $query = "SELECT * FROM `users` WHERE authentication_token = ?"; 
        $stmt = $pdo->prepare($query);
        $stmt -> execute([$id]);
foreach ($stmt as $row){
$ussername = $row['username'];
    
}

}
/*
echo $ussername. $password."asd";
die();  
*/
   $ime = $pdo->prepare('SELECT * FROM users WHERE (username = ?)AND(password = ?)');
   $ime->execute([$ussername, $password]);
   $nevemvec = $ime->rowcount();
   /*
   echo $nevemvec;
       die();
    */
    
   if($nevemvec == 1){
   $ime = $pdo->prepare('SELECT * FROM users WHERE (username = ?)AND(password = ?)');
   $ime->execute([$ussername, $password]);
   foreach ($ime as $row){
       /*
       echo $row['id'].$ussername;
       die();
        */
        
            if(!isset($_COOKIE[$cookie_login])>0){
                $cookie_value = $ussername;
                $cookie_value1 = $cookie_value;
                  setcookie($cookie_login, $cookie_value,time() + (10*999999),"/");
                  $_SESSION['username'] = $ussername;
                  $_SESSION['user_id'] = $row['id'];
                  /*
                  echo $_SESSION['username'].$_SESSION['user_id'];
                          die();
                   
                   */
                  header('Location: ../index.php?users=0');
            }
            } 

        }else{
              
              
            header('Location: ./login.php?id=1');
        }
        
