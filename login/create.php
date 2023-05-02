<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../vendor/autoload.php';

    require_once '../functions/functions.php';
    require_once '../class/users.class.php';

    session_start();
    if (isset($_SESSION['logged-in'])){
        header('location: ../dashboard/dashboard.php');
    }

    function sendemail_verify($name, $email, $verify_token)
    {
        $mail = new PHPMailer(true);

         //Server settings
         $mail->isSMTP();                                           //Send using SMTP
         $mail->Host       ='smtp.gmail.com';                       //Set the SMTP server to send through
         $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
         
         $mail->Username='deanlistics2023@gmail.com';            //SMTP username
         $mail->Password='xqwljozlyvipgocx';                      //SMTP password

         $mail->SMTPSecure ='tls';                                  //Enable implicit TLS encryption
         $mail->Port       =587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
     
         //Recipients
         $mail->setFrom('xt202002168@wmsu.edu.ph', $name);
         $mail->addAddress($email);                                 //Add a recipient
     
         //Content
         $mail->isHTML(true);                                       //Set email format to HTML
         $mail->Subject = 'Email Verification';

         $email_template = "
            <h1> Hey, $name </h1>
            <p> It looks like you have sign up to Dean's List Application Sytem. If this is you, follow the link below to verify your email.
                If this isn't you, we suggest to contact your adviser.
            </p>

            <a type='button' class='btn btn-success' href='http://localhost/deanslistappnew/users/controller/verify-email.php?token=$verify_token'> Verify Email </a>
         ";

         $mail->Body = $email_template;

         $mail->send();
    }

    if(isset($_POST['submit'])) {
        $validEMail = !validate_user_email($_POST['user_email']);
        if(!$validEMail) {
            $user_password = $_POST['user_password'];
            $user_firstname = $_POST['user_firstname'];
            $user_lastname = $_POST['user_lastname'];
            $curriculum = $_POST['curriculum'];


            $name           = $_POST['user_lastname'];
            $email          = $_POST['user_email'];
            $verify_token   = md5(rand());

            // create user instance
            $users = new User();

            // set user email, password, firstname, lastname, curriculum
            $users->user_email = $_POST['user_email'];
            $users->user_password = $_POST['user_password'];
            $users->user_firstname = $_POST['user_firstname'];
            $users->user_lastname = $_POST['user_lastname'];
            $users->curriculum = $_POST['curriculum'];
            $users->verify_token = $verify_token;
            
            // Before Doing this, Check if email exists.
            if (!$users->CheckIfExistsEmail($_POST['user_email'])){
                $result = $users->add();
                sendemail_verify("$name", "$email", "$verify_token");
        
                if($result){
                    // set session
                    //$error = '';
                    //$_SESSION['logged-in'] = $_POST['user_email'];
                    //$_SESSION['user_email'] = $_POST['user_email'];
                    //$_SESSION['user_firstname'] = $_POST['user_firstname'];
                    //$_SESSION['user_lastname'] = $_POST['user_lastname'];
                    //$_SESSION['curriculum'] = $_POST['curriculum'];
                    //$_SESSION['user_type'] = 'student';

                    //$user_id = $users -> getLatestUserId();
                    
                    //$_SESSION['user_id'] = $user_id[0];

                    $_SESSION['status'] ='Registration successful test';
                    header('location: ../login/login.php');
                }
                else{
                    $error = 'Invalid email/password.<br> Please try again.';
                }
            }else{
                $error = 'Email already used.';
            }
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
    <title>Create an Account | Dean's List Application System - CCS</title>
    <link rel="icon" href="../img/ccslogo.png" type="image/icon type">
</head>
<body>
    <div class="login-container">
        <form class="create-form" action="create.php" method="post">
        <div class="box-image">
            <center><img src="ccslogo.png" width ="100" height = "100"></center>
			<div class="title">Dean's List Application System</div><br><br>
            <h6 style ="font-weight:300; font-size:15px; text-align:center;">Create your account</h6>
		</div>

            <label for="user_email"></label>
            <input type="email" id="user_email" name="user_email" required tabindex="1" placeholder="Enter email" value="<?php if(isset($_POST['user_email'])) { echo $_POST['user_email']; } ?>">
            <?php if(isset($_POST['submit']) && !validate_user_email($_POST['user_email'])){ ?>
                    <p class="error">Email is invalid. Use only @wmsu.edu.ph</p>
            <?php } 
            ?> 

        
            <label for="user_password"></label>
            <input type="password" id="user_password" name="user_password" placeholder="Enter password" required tabindex="2">

            <label for="user_firstname"></label>
            <input type="text" id="user_firstname" name="user_firstname" placeholder="Enter First Name" required tabindex="3">

            <label for="user_lastname"></label>
            <input type="text" id="user_lastname" name="user_lastname" placeholder="Enter Last Name" required tabindex="4">

            <div class="form-floating dropdown-select">
            <label for="floatingSelect">Course</label>
                <select class="form-select" name="curriculum" id="curriculum" required tabindex="5">
                    <option value="">-- Select --</option>
                    <option value="BSCS">Computer Science</option>
                    <option value="BSIT">Information Technology</option>
                </select>
                    
             </div>
             <?php
            
                if(isset($error)){
                    echo '<div><p class="error">'.$error.'</p></div>';
                }
                
            ?>
            <input class="button" type="submit" value="Create" name="submit" tabindex="5">
            <a class = "back" href="login.php" style ="text-decoration: none;"><i class='bx bx-caret-left'></i>Back to Login</a>
        </form>
    </div>
</body>
</html>