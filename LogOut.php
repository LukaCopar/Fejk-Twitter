<?php
include_once './connection/database.php';
unset($_COOKIE[$cookie_login]);
// empty value and expiration one hour before
$res = setcookie($cookie_login, '', time() - 3600);
header("Location: ./login/login.php");