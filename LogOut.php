    <?php
include_once './connection/database.php';
    session_start();
    
    session_destroy();
setcookie($cookie_login,$cookie_value1, time() - 3600,"/");

header("Location: /Fejk-Twitter/login/login.php");