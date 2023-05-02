<?php
    session_start();
    include '../model/database.php';

    if(isset($_GET['token'])){
        $token = $_GET['token'];

        $verify_query = "SELECT verify_token, user_status FROM users WHERE verify_token='$token' LIMIT 1";

        $verify_query_run = mysqli_query($conn, $verify_query );

        if (mysqli_num_rows($verify_query_run) > 0) {
            $row = mysqli_fetch_array($verify_query_run);
            
            if($row['user_status'] == "Pending") {
                
                $clicked_token = $row['verify_token'];
                $sql = "UPDATE users SET `user_status` = 'Active' WHERE verify_token='$clicked_token' LIMIT 1";

                if( mysqli_query($conn, $sql)) {
                    $_SESSION['status'] = 'Your Account has been verified successfully';
                    echo "Your Account has been verified successfully";
                    header("Location: ../../login/Login.php");
                    exit(0);

                } else {

                    $_SESSION['status'] = 'Verification Failed!';
                    echo "Verification Failed";
                    header("Location: ../../login/Login.php");
                    exit(0);
                }

            } else {

                $_SESSION['status'] = 'Email already verified!';
                echo "Email already verified";
                header("Location: ../../login/Login.php");
            }
            
        } else {
            $_SESSION['status'] = 'This token does not Exists!';
            echo "This token does not Exists";
            header("Location: ../../login/Login.php");
        }
    } else {
        $_SESSION['status'] = 'Not Allowed!';
        echo "Not Allowed";
        header("Location: ../../login/Login.php");
    }
?>