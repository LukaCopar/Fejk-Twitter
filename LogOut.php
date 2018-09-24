<?php
include_once './connection/database.php';
include_once './login/login_check.php';

// empty value and expiration one hour before
setcookie($cookie_login,$cookie_value, time() - 3600,"/");

header("Location: ./login/login.php");