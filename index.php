<!DOCTYPE html>

<?php
    include_once('./header.php');
include_once './connection/database.php';
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
        <?php
        $lol = $_COOKIE[$cookie_login];
        $query = 'SELECT * FROM users WHERE username = "'.$_COOKIE[$cookie_login].'"';
        $stmt = $pdo->query($query);
       
        ?>
        <div id="leu-main">
          
            <div id="leu-profile">
                <div id="banner-pic"></div>
                <div class="profile-profile-pic">
                    <img class="avatar-pic" src="<?php foreach ($stmt as $row){
        echo  $row['profile_pic_URL'];}?>">
                </div>
                <div class="profile2-info">
                    <span class="tweet-username"><?php echo $_COOKIE[$cookie_login];?></span>
                <?php echo "@".$row['name'].$row['surname']; ?>
                </div>
            </div>
            
        </div>
        
        
        <div id="sredinski-main">
            <button type="button" class="tweet-btn" onclick="location.href='./tweet/tweet_a_tweet.php';"> TWEET</button>
            <?php
            $cist_blizu1 = $_COOKIE[$cookie_login];
            $query4 = "SELECT id FROM users WHERE username = ?";
            $stmt4 = $pdo->prepare($query4);
            $stmt4->execute([$cist_blizu1]);
            
            foreach ($stmt4 as $row69 ){
            $cist_blizu = $row69['id'];
            }
           $stmt = $pdo->prepare('SELECT * FROM tweets t INNER JOIN users u ON t.user_id=u.id INNER JOIN follows f ON f.follower_id = u.id WHERE f.user_id = ? ORDER BY t.id DESC');
           $stmt -> execute([$cist_blizu]);
            
            
            foreach($stmt as  $row){
            echo ' <div class="tweet">';
            echo ' <div class="tweet-profile-pic">';
             echo '<img class="avatar-pic" src="'.$row['profile_pic_URL'].'">';
             echo '  </div>';
            
            echo ' <div class="profile-info">';
             echo '<span class="tweet-username">'.$row['username'].'</span> @'.$row['name'], $row['surname'];
             echo '  </div>';
            
            echo ' <div class="content">';
             echo $row['content'];
             echo '  </div>';
            
            echo ' <div class="tweet-pic">';
             echo '<img class="tweet-image" src="'.$row['picture'].'">';
             echo '  </div>';
            
            echo ' <div class="tweet-bottom">';
             echo '<button class="tweet-icons-bottom" type="button" ><div>Like</div></button>';
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