<?php
include_once '../connection/database.php';

$ussername = $_COOKIE[$cookie_login];

$ime = $pdo->prepare('SELECT id FROM users WHERE (username = ?)');
$id = $ime->execute([$ussername]);
$row = $ime->fetch();
$jau = $row['id'];
  
$content = $_POST['content'];
$userID = $jau;
$URL = "";
//    echo $content, $userID;


$query = "INSERT INTO `tweets`(`user_id`, `content`, picture) VALUES (?,?,?)";
$stmt = $pdo ->prepare($query);
$stmt -> execute([$userID, $content, $URL]);

header('Location: ../index.php');


