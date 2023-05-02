<?php
    
    //this is where the page starts

    //start session
    session_start();

    //check if user is login already otherwise send to login page
    if (isset($_SESSION['user_type'])){
        if (isset($_SESSION['user_type']) == 'admin')
            header('location: dashboard');
        else if (isset($_SESSION['user_type']) == 'student')
            header('location: dashboard');
        else
            $_SESSION['user_type'] = null;
            header('location: home.php');
    }
    else{
        $_SESSION['user_type'] = null;
        header('location: home.php');
    }
    
?>