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
        <title></title>
        </head>
    <body>
        <?php
        // put your code here
        ?>
         <div>
        <form action="./login_check.php" method="post"><br><br>
            <input type="text" name="first_name" placeholder="username" autofocus class="skatle"/><br><br>
            <input type="password" name="pass" placeholder="password" class="skatle" /><br><br>
            <input type="submit" class="button" value="Log In"/>
            
        </form>
            
            
        
        </div>
    </body>
</html>
