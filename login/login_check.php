<?php
include_once '../connection/database.php';
$ime = $pdo->query('SELECT * FROM users');
$row = $ime->fetch();

$ussername = $_POST['first_name'];
$password = $_POST['pass'];

if($row['name'] == $ussername && $row['password'] == $password){
        $cookie_value = $row['name']. $row['surname'];
        
            //checks if cookie alredy exists
            if(!isset($_COOKIE[$cookie_login])>0){
                
                  setcookie($cookie_login, $cookie_value,time() + (86400 * 30),"/");
                  header('Location: ../index.php');
                  die();
            } 

        }else{
            header('Location: ./login.php?id=1');
            
        }
         
