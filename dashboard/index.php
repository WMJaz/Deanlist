<?php
    session_start();
    if (!isset($_SESSION['logged-in'])){
        header('location: ../login/login.php');
    }
    else{
        if (isset($_SESSION['user_type'])){
            if (strtolower($_SESSION['user_type']) == 'admin')
                header('location: dashboard.php');
            else if (strtolower($_SESSION['user_type']) == 'student')
                header('location: dashboard.php');
            else
                header('location: dashboard.php');
        }
        else{
            header('location: home.php');
        }
    }
?>