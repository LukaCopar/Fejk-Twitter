<?php

include_once './header.php';


$tweet_id = $_GET['tweet_id'];



$queryTest="DELETE FROM tweets WHERE id = ?";
$stmt1 = $pdo->prepare($queryTest);
$stmt1->execute([$tweet_id]);
$ajez = $stmt1->rowcount();

header('Location: ./index.php?users=0');

