<?php 
    require_once '../class/listers.class.php';
    if (isset($_GET['idx'])) {
        $ID = $_GET['idx'];
        $listers = new Listers();
        if($listers->ReApply($ID)){
            header('location: application-new.php');
        }
    }
    if (isset($_GET['idy'])) {
        $ID = $_GET['idy'];
        $listers = new Listers();
        if($listers->CancelPending($ID)){
            header('location: application-new.php');
        }
    }
    else{
        header('location: application-new.php');
    }
?>