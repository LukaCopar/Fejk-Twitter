<!DOCTYPE html>

<?php
include_once('../connection/database.php');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    </head>
    <body>
        <?php
if(isset($_COOKIE[$cookie_login])>0){
    ?>
        <div class="header2">   
            <div id="leu">
                hellos  
                
            </div>
            <div id="desn">
                <button type="button" id="log_out_btn" onclick="location.href='../LogOut.php';">Log Out</button>
            </div>
            
            
       <?php
}
        ?>
        </div>
       
    </body>
</html>
