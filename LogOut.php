    <?php
include_once './connection/database.php';
setcookie($cookie_login,$cookie_value1, time() - 3600,"/");

header("Location: ./login/login.php");