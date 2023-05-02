<?php

    require_once '../functions/functions.php';
    require_once '../class/listers.class.php';

    //resume session here to fetch session values
    session_start();
    /*
        if user is not login then redirect to login page,
        this is to prevent users from accessing pages that requires
        authentication such as the dashboard
    */
    if (!isset($_SESSION['logged-in'])){
        header('location: ../login/login.php');
    }
    $listers = new Listers();
    if(!isset($_GET['id'])){
        //Means not ID found Note: THis is not safe. Because you are showing the Primary Key exposed on the URL itself
        header('location: listers.php');
    }
    //TO Be Modify (Needs Confirmation)
    //if the above code is false then code and html below will be executed
    $listers = new Listers();
    if($listers->deleteDeansLister($_GET['id'])){
        header('location: listers.php');
    }
    else{
        echo("DELETION FAILED");
    }
?>