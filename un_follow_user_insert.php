<?php

include_once './connection/database.php';

$ime = $pdo->prepare('SELECT * FROM users WHERE (username = ?)');
   $lol = $ime->execute([$_COOKIE[$cookie_login]]);
   foreach ($ime as $row){
       $userID = $row['id'];
   }
   


$followID = $_GET['fID'];
//echo $followID, $userID;


//delete follow from database
$query = "DELETE FROM `follows` WHERE (user_id = ?) AND (follower_id = ?)";
$stmt = $pdo->prepare($query);
$stmt->execute([$userID, $followID]);

header('Location: ./users.php?users=1');