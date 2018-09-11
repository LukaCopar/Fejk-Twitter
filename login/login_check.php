<?php
include_once '../connection/database.php';
$ime = $pdo->query('SELECT * FROM users');
$row = $ime->fetch(PDO::FETCH_ASSOC);

$ussername = $_POST['first_name'];
$password = $_POST['pass'];

if($row['name'] == $ussername && $row['password'] == $password){
        $cookie_name = $row['id'];
        $cookie_value = $row['name']. $row['surname'];
            //checks if cookie alredy exists
            if(!isset($_COOKIE[$cookie_name])>0){
                //create cookie for 1 minute
                  setcookie($cookie_name, $cookie_value, time() + 60, "/");
            } 
            header('Location: ../index.php');
        }
         
