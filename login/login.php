<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once('./header.php');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        
    
        </head>
    <body>
        
        
        <div id="login">
        <form action="./login_check.php" method="post">
            <input type="text" name="first_name" placeholder="username" autofocus class="skatle"/>
            <input type="password" name="pass" placeholder="password" class="skatle" />
            <input type="submit" class="button" value="Log In"/>
             <?php
        if(isset($_GET['id'])>0){
             $id = $_GET['id'];
                if($id == 1){
                    echo '<div class="alert alert-warning width">wrong password!</div>';
                    }
        }
        ?>
            
        </form>
            
            
        
        </div>
    </body>
</html>
