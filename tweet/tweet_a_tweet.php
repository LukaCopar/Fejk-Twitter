<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php
        include_once './header.php';
        ?>
        <meta charset="UTF-8">
        <title>tweetr/tweet</title>
    </head>
    <body>
        
         <div id="tweet-a-tweet">
             <form action="./tweet_the_tweet.php" method="post" enctype="multipart/form-data">
                 
            <div><textarea class="tweet-input"  type="text" name="content" placeholder="What do you want to tweet!"></textarea></div>
            <label class="input-file">
                Chose an image
            <input type="file" name="file" id="file" />
            </label>
            <input type="submit"  class="button-tweet margin-top" style="margin-left: -10%; width: 130%;" value="TWEET! "/>
            
        </form>
            
        <?php
       
        ?>
    </body>
</html>
