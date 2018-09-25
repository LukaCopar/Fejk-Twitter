<?php

include_once './connection/database.php';

$ime = $pdo->prepare('SELECT * FROM users WHERE (username = ?)');
   $lol = $ime->execute([$_COOKIE[$cookie_login]]);
   foreach ($ime as $row){
       $userID = $row['id'];
   }
   


$followID = $_GET['fID'];
//echo $followID, $userID;


//add a new follower
$query = "INSERT INTO `follows`(`user_id`, `follower_id`) VALUES (?,?)";
$stmt = $pdo->prepare($query);
$stmt->execute([$userID, $followID]);

header('Location: ./users.php?users=1');