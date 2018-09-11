<!DOCTYPE html>

<?php
require_once('./connection/database.php');

?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    </head>
    <body>
        
        <div class="header2"> 
            aspdi
            <?php
           
            
        $stmt = $pdo->query('SELECT id FROM users');
        $id = $stmt->fetch();
        echo $name;
       
        ?>
        </div>
       
    </body>
</html>
