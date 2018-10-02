<!DOCTYPE html>

<?php
    include_once('./header.php');
include_once './connection/database.php';
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
                    <span class="tweet-username"><a href="./edit/edit.php"><?php echo $_SESSION['username'];?></a></span>
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
           $stmt = $pdo->prepare('SELECT u.name,u.surname,u.profile_pic_URL,t.id,t.picture,u.username,t.content FROM tweets t INNER JOIN users u ON t.user_id=u.id INNER JOIN follows f ON f.follower_id = u.id WHERE f.user_id = ? OR u.username = ?  ORDER BY t.id DESC');
           $stmt -> execute([$cist_blizu, $cist_blizu1]);
            
            
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
            $querylike="SELECT * FROM likes WHERE tweet_id=?";
            $stmtlike = $pdo -> prepare($querylike);
            $stmtlike ->execute([$row['id']]);
            $koklikou = $stmtlike -> rowcount();        
            
           
            
            
            ?>
            <button class="tweet-icons-bottom" type="button" onclick="location.href='./like_dislike.php?tweet_id=<?php echo $row['id'];  ?>'"><div><?php 
$queryTest="SELECT * FROM likes WHERE (user_id = ?) AND (tweet_id = ?)";
$stmt1 = $pdo->prepare($queryTest);
$stmt1->execute([$_SESSION['user_id'],$row['id']]);
$ajez = $stmt1->rowcount();
if($ajez > 0){
    
echo "Dislike |";

}else{

echo "Like |";
}
echo $koklikou; ?></div></button>
            
            
            <?php
             
            $queryTest2="SELECT * FROM tweets WHERE (user_id = ?) AND (id = ?)";
            $stmt1 = $pdo->prepare($queryTest2);
            $stmt1->execute([$_SESSION['user_id'], $row['id']]);
            $ajez = $stmt1->rowcount();
            if($ajez > 0){
            $kabrisat = "'./delete_tweetr.php?tweet_id=". $row['id']."'";
            echo '<button class="tweet-icons-bottom" type="button" onclick="location.href='.$kabrisat.'">Delete Dis?</button>';

            }
            ?>
             
             <?php
             echo '</div>';
                
            echo '</div>';
            }
            ?>
        </div>
        
        
        <div id="desn-main">
            
            
        </div>
        

        
    </body>
</html>