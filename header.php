<!DOCTYPE html>

<?php
include_once('./connection/database.php');
include_once ('./cookie_check.php');
include_once ('./session.php');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="./style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    </head>
    <body>
        <?php
        if(isset($_COOKIE[$cookie_login])>0){
    ?>
        
        <div class="header2">   
            <div id="leu">
                welcome: 
                <?php
                    echo $_SESSION['username'];
                    
    ?>
                
            </div>
            <div id="desn">
                <a href="#" onclick="signOut();">Sign out</a>
<script>
  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }
</script>
                <?php
                $neki = $_GET['users'];
                if($neki == 1){
                 ?>
               
                    <button type="button" id="log_out_btn" onclick="location.href='./index.php?users=o';">main page</button>
                <?php
                }else{
                ?>
                    <button type="button" id="log_out_btn" onclick="location.href='./users.php?users=1';">users</button>
                <?php
                }
                ?>
                
                <button type="button" id="log_out_btn" onclick="location.href='./LogOut.php';">Log Out</button>
            </div>
            
            
       <?php
        }
        ?>
        </div>
       
    </body>
</html>
