<?php
    session_start();
    
    $allowed = ['/Fejk-Twitter/login/login.php', '/Fejk-Twitter/login/login_check.php'
        , '/Fejk-Twitter/index.php?users=0', '/Fejk-Twitter/register/register.php', '/Fejk-Twitter/register/input_user.php'
        , '/Fejk-Twitter/index.php?users=1', '/Fejk-Twitter/users.php', '/register/register.php' ];
    
    /*
    echo $_SERVER['REQUEST_URI'];
    die();
     * 
     */

    if(!isset($_SESSION['username'])&& 
            !in_array($_SERVER['REQUEST_URI'], $allowed)){
        echo $_SERVER['REQUEST_URI'];
        header("Location: ../login/login.php");
        
        
    }
    if (!isset($_SESSION['user_id']) && 
            !in_array($_SERVER['REQUEST_URI'], $allowed)) {
        header("Location: ../login/login.php");
    }
 