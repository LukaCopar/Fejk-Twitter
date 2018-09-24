<!DOCTYPE html>

<?php
include_once('./header.php');
include_once ('./connection/cookie_check.php');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>tweeter</title>
        <link rel="shortcut icon" href="./images/twette.ico"/>
        <style>
            body{
                background-color: #e6ecf0; 
                line-height: 20px;
            }
            
        </style>
    </head>
    <body>
        
        <div id="leu-main">
            <div id="leu-profile">
                profile pa tu
                
                
            </div>
            
        </div>
        
        
        <div id="sredinski-main">
            <button type="button" class="tweet-btn" onclick="location.href='./tweet/tweet_a_tweet.php';"> TWEET</button>
            <?php
            $stmt = $pdo->query('SELECT * FROM tweets t INNER JOIN users u ON t.user_id=u.id ORDER BY t.id DESC');
           
            
            
            foreach($stmt as  $row){
            echo ' <div class="tweet">';
            echo ' <div class="tweet-profile-pic">';
             echo '<img class="avatar-pic" alt="picture here sry i no show" src="./images/twette.ico">';
             echo '  </div>';
            
            echo ' <div class="profile-info">';
             echo '<span class="tweet-username">'.$row['username'].'</span> @'.$row['name'], $row['surname'];
             echo '  </div>';
            
            echo ' <div class="content">';
             echo $row['content'];
             echo '  </div>';
            
            echo ' <div class="tweet-pic">';
             echo '<img alt="picture here sry i no show" src="'.$row['profile_pic_URL'].'">';
             echo '  </div>';
            
            echo ' <div class="tweet-bottom">';
             echo '<button class="tweet-icons-bottom" type="button"><div>Like</div></button>';
             echo '</div>';
                
            echo '</div>';
            }
            ?>
        </div>
        
        
        <div id="desn-main">
            desn
            
        </div>
        

        
    </body>
</html>
