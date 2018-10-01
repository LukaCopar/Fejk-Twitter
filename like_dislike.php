<?php
include_once './header.php';

$user_id = $_SESSION['user_id'];
$tweet_id = $_GET['tweet_id'];

/*
echo $user_id."asd".$tweet_id;

*/

$queryTest="SELECT * FROM likes WHERE (user_id = ?) AND (tweet_id = ?)";
$stmt1 = $pdo->prepare($queryTest);
$stmt1->execute([$user_id,$tweet_id]);
$ajez = $stmt1->rowcount();
if($ajez > 0){
    
$query = "DELETE FROM `likes` WHERE (user_id = ?) AND (tweet_id = ?)";
$stmt = $pdo->prepare($query);
$stmt->execute([$user_id,$tweet_id]);

}else{


$query = "INSERT INTO `likes`(`user_id`, `tweet_id`) VALUES (?,?)";
$stmt = $pdo->prepare($query);
$stmt->execute([$user_id,$tweet_id]);
}
header('Location: ./index.php?users=0');