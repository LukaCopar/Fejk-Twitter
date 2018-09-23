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
            <?php
            for($i=0; $i<5; $i++){
            echo ' <div class="tweet">';
            echo ' <div class="tweet-profile-pic">';
             echo '<img class="avatar-pic" alt="picture here sry i no show" src="./images/twette.ico">';
             echo '  </div>';
            
            echo ' <div class="profile-info">';
             echo '<span class="tweet-username">Luka Čopar</span> @LukaCopar';
             echo '  </div>';
            
            echo ' <div class="content">';
             echo 'kr en tekst pa take stvari';
             echo '  </div>';
            
            echo ' <div class="tweet-pic">';
             echo '<img alt="picture here sry i no show" src="./images/twette.ico">';
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
