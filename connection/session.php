<?php
    session_start();
    
    $allowed = ['fejk_tweetr/login.php','/fejk_tweetr/login_check.php',
                '/fejk_tweetr/registration.php', '/fejk_tweetr/insert_ucenca.php',
                '/fejk_tweetr/index.php',
                '/fejk_tweetr/vnos_ucenca.php',
                '/fejk_tweetr/header.php','fejk_tweetr.php'];
    
    if(!isset($_SESSION['first_name'])&& 
            !in_array($_SERVER['REQUEST_URI'], $allowed)){
        header("Location: login.php");
        
        
    }
    
    if (!isset($_SESSION['user_id']) && 
            !in_array($_SERVER['REQUEST_URI'], $allowed)) {
        header("Location: login.php");
    }
