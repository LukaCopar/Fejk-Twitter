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
        <div id="leu-main"> 
        </div>
        
        <div id="sredinski-main" style="text-align: left;">
        <?php
        $tosemjaz = $_COOKIE[$cookie_login];
        
        $query = 'SELECT * FROM users WHERE username != ?';
        $stmt = $pdo->prepare($query);
           $stmt->execute([$tosemjaz]);
            
           
                
                
                
                
                
            foreach($stmt as  $row){
                
                
                $padejnodelejze = $_COOKIE[$cookie_login];
                $jebemtimatrupizdotatijojebem = -1;
                
            $query3 = "SELECT * FROM users WHERE (username = ?)";
                $stmt3 = $pdo->prepare($query3);
                $stmt3 -> execute([$padejnodelejze]);
                foreach ($stmt3 as $row2){
                    $jebemtimatrupizdotatijojebem = $row2['id']; 
                }
                
                
                
                
                
                $query2 = 'SELECT * FROM `follows` WHERE user_id = ? AND follower_id = ?';
                $stmt2 = $pdo->prepare($query2);
                $stmt2 -> execute([$jebemtimatrupizdotatijojebem,$row['id']]);
                $folowa = $stmt2->rowcount();
               // echo $folowa.$row['id'];
                
            echo ' <div class="user-foolow">';
            echo ' <div>';
             echo '<img class="avatar-pic" src="'.$row['profile_pic_URL'].'">';
             echo '  </div>';
            
            echo ' <div>';
             echo '<span class="tweet-username">'.$row['username'].'</span> @'.$row['name'], $row['surname'];
             echo '  </div>';
             
             if($folowa == 0){
             $url = './follow_user_insert.php?fID='.$row['id'];
             $jepttabo = "follow";
             }else{
                 $url = './un_follow_user_insert.php?fID='.$row['id'];
                 $jepttabo = "unfollow";
             }
              echo ' <div>';
             ?><button class="button-follow" onclick="location.href='<?php echo $url; ?>';"><?php echo $jepttabo; ?></button><?php
             echo '</div>';
                
            echo '</div>';
            }
            ?>
        </div>
    </body>
</html>
