<script>
                    function signOut(googleUser) {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }</script> 
   <?php
include_once './connection/database.php';
    session_start();
    
    session_destroy();
     
setcookie($cookie_login,$cookie_value1, time() - 3600,"/");

header("Location: /Fejk-Twitter/login/login.php");