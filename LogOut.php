    <?php


include_once './connection/database.php';
include_once './login/login_check.php';
include_once './gpConfig.php';

$gClient->revokeToken();
// empty value and expiration one hour before
setcookie($cookie_login,$cookie_value, time() - 3600,"/");
echo '<script type="text/javascript">',
     'signOut();',
     '</script>'
;
header("Location: ./login/login.php");
