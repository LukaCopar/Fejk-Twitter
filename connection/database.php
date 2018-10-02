<?php
$host = 'localhost';
$db   = 'luka';
$user = 'luka';
$pass = 'copar123';
$charset = 'utf8';

$cookie_login = "login_cookie";
$cookie_value1;

$salt = "lajsdfsnla8954z89I()&";

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
     $pdo = new PDO($dsn, $user, $pass, $opt);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}


