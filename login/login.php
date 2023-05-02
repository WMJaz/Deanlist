<?php
    require_once '../class/users.class.php';
    session_start();
    if (isset($_SESSION['logged-in'])){
        header('location: ../dashboard/index.php');
    }
    if(isset($_POST['user_email']) && isset($_POST['user_password'])){
        // class instance
        $users = new User();
        // set username and password
        $users->user_email = $_POST['user_email'];
        $users->user_password = $_POST['user_password'];

        $result = $users->validate();

        if($result){
            $error = '';
            $_SESSION['logged-in'] = $result['user_email'];
            $_SESSION['user_email'] = $result['user_email'];
            $_SESSION['user_firstname'] = $result['user_firstname'];
            $_SESSION['user_lastname'] = $result['user_lastname'];
            $_SESSION['user_type'] = $result['user_type'];
            $_SESSION['user_id'] = $result['user_id'];
            $_SESSION['curriculum'] = $result['curriculum'];
            header('location: ../dashboard/index.php');
        }
        else{
            $error = 'Invalid email/password.<br> Please try again.';
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=p, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <title>Login | Dean's List Application System - CCS</title>
    <link rel="icon" href="../img/ccslogo.png" type="image/icon type">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <div class="login-container">
        <div class="imgBx">
            <img src="../img/ccsbg.png">
        </div>
        <form class="login-form" action="login.php" method="post">
            <div class="box-image">

                <center><img src="ccslogo.png" width ="120" height = "120"></center><br>
                <div class="title" style="font-weight: 410">Dean's List Application System</div>
            </div>
                <br/>
                <label for="user_email">Email</label>
                <input type="text" id="user_email" name="user_email" placeholder="Enter Email" required tabindex="1">
                
                <label for="user_password">Password</label>
                <input type="password" id="user_password" name="user_password" placeholder="Enter password" required tabindex="2">
                <div>
                
                <label for="remember" id="remember"><input type="checkbox" id="remember" name="remember">Remember me</label>
                </div>

                       
                <input class="button" type="submit" value="Login" name="login" tabindex="3">

                <br>

                <p style="text-align: center;  padding-top: 12px;">Don't have an account? <a class="create" href="create.php">Sign up</a></p>

                <?php

                    if(isset($error)){
                        echo '<div><p class="error">'.$error.'</p></div>';
                    }

                ?>

        </form>
    </div>
    

</body>
</html>