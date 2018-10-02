
   <?php
include_once './connection/database.php';
    session_start();
    
    session_destroy();
     
setcookie($cookie_login,$cookie_value1, time() - 3600,"/");

header("Location: https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=https://projekt1.lcopar.eu/login/login.php");
//header("Location: ./login/login.php");