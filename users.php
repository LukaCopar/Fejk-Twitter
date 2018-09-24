<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php 
        include_once './connection/database.php';
        include_once './header.php';
        ?>
        <meta charset="UTF-8">
        <title>tweetr/users</title>
    </head>
    
    <body>
        
        <?php
        $tosemjaz = $_COOKIE[$cookie_login];
        
        $query = 'SELECT * FROM users WHERE username != ?';
        $stmt = $pdo->prepare($query);
           $stmt->execute([$tosemjaz]);
            
            
            foreach($stmt as  $row){
            echo ' <div class="user-foolow">';
            echo ' <div>';
             echo '<img class="avatar-pic" src="'.$row['profile_pic_URL'].'">';
             echo '  </div>';
            
            echo ' <div>';
             echo '<span class="tweet-username">'.$row['username'].'</span> @'.$row['name'], $row['surname'];
             echo '  </div>';
             
             
             $url = './follow_user_insert.php?fID='.$row['id'];
              echo ' <div>';
             ?><button class="button-follow" onclick="location.href='<?php echo $url; ?>';">follow</button><?php
             echo '</div>';
                
            echo '</div>';
            }
            ?>
    </body>
</html>
