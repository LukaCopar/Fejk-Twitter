<?php
    session_start();
    
    $allowed = ['/redovalnica_dijaki/login.php','/redovalnica_dijaki/login_check.php',
                '/redovalnica_dijaki/registration.php', '/redovalnica_dijaki/insert_ucenca.php',
                '/redovalnica_dijaki/index.php',
                '/redovalnica_dijaki/vnos_ucenca.php',
                '/redovalnica_dijaki/header.php','admin/admin_page.php'];
    
    if(!isset($_SESSION['first_name'])&& 
            !in_array($_SERVER['REQUEST_URI'], $allowed)){
        header("Location: login.php");
        
        
    }
    
    if (!isset($_SESSION['user_id']) && 
            !in_array($_SERVER['REQUEST_URI'], $allowed)) {
        header("Location: login.php");
    }
