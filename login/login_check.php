<?php
include_once '../connection/database.php';
$ime = $pdo->query('SELECT name FROM users');
foreach ($ime as $row)
{
    echo $row['name'] . "\n";
}

die();