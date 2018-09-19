<?php
include_once './connection/database.php';
include_once './login/login_check.php';
unset($_COOKIE[$cookie_login]);

// empty value and expiration one hour before
setcookie($cookie_login,$cookie_value, time() - 3600,"/");

header("Location: ./login/login.php");