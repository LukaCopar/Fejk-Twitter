<?php
include_once '../connection/database.php';
$ime = $pdo->query('SELECT name FROM users');
$row = $ime->fetch(PDO::FETCH_ASSOC);

        $cookie_name = $row['name'];
        $cookie_value = $row['name'];
        
        setcookie($cookie_name, $cookie_value, time() + 86400, "/");
        
        echo 'Cookie: '. $cookie_name. "<br>";
        echo 'Value: '. $_COOKIE[$cookie_name];

die();