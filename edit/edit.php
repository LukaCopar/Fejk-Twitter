<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php 
    include_once './header.php';
    include_once '../connection/database.php';
    ?>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body><?php
        $lol = $_COOKIE[$cookie_login];
        $query = 'SELECT * FROM users WHERE username = "'.$_COOKIE[$cookie_login].'"';
        $stmt = $pdo->query($query);
        foreach ($stmt as $row)
        ?>
         <div id="register">
        <form action="./update_edit.php" method="post" enctype="multipart/form-data">
            
            <div class="reg-input"><input class="input2" type="text" name="username" placeholder="username" value="<?php  echo $row['username']; ?>" /></div>
           <div class="reg-input"> <input class="input2" type="password" name="pass" placeholder="old password" value="<?php ?>" /></div>
           <div class="reg-input"> <input class="input2" type="password" name="pass2" placeholder="new password" value="<?php ?>" /></div>
           <label class="input-file-reg"> change picture<input class="input2" type="file" name="file" /></label>
           <?php
           if(isset($_GET['id']) > 0){
               echo '<script>alert("old passwords is incorrect!")</script>';
               
           }
           ?>
           <select name="country">
               <?php
               
              $ime = $pdo->query('SELECT * FROM countries');
              foreach ($ime as $row){
                        echo '<option value="'.$row['id'].'" >'.$row['name'].'</option>';
                       
                    }
               
               ?>
           </select>
            <input type="submit" class="button-reg margin-top" style="margin-left: -10%; width: 130%;" value="Done"/>
            
        </form>
            
    </body>
</html>
