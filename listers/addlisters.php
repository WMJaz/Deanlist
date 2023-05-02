<?php

    require_once '../functions/functions.php';
    require_once '../class/listers.class.php';
    require_once '../class/database.php';

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
    //if the above code is false then code and html below will be executed
    $listers = new Listers();
    if(!isset($_GET['id'])){
        //Means not ID found Note: THis is not safe. Because you are showing the Primary Key exposed on the URL itself
        header('location: listers.php');
    }
    //if the above code is false then code and html below will be executed
    $listers = new Listers();
    $applicantInfo = $listers->GetCertainDeanListApplicant($_GET['id']);
    $listers->App_ID = $applicantInfo['tmp_appid'];
    $listers->Fullname = $applicantInfo['user_name'];
    $listers->GPA = $applicantInfo['gpa'];
    $listers->department = $applicantInfo['curriculum'];
    $listers->year_level = $applicantInfo['year_level'];


    echo $listers->App_ID ;
    echo $listers->Fullname ;
    echo $listers->GPA ;
    echo $listers->department ;
    echo $listers->year_level ;
    if($listers->add()){
        header('location: listers.php');
    }
    else{
        echo("ADD FAILED");
    }

?>
