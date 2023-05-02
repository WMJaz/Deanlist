<?php
	include '../model/database.php';

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	require '../../vendor/autoload.php';


	$user_email     = $_POST['user_email'];
	$user_password  = $_POST['user_password'];
	$user_firstname	= $_POST['firstName'];
	$user_lastname	= $_POST['lastName'];
	$user_type      = $_POST['user_type'];
	$curriculum		= $_POST['curriculum'];	
	$user_status    = 'Active';
	$verify_token	= md5(rand());

     $sql = "INSERT INTO `users`( `user_email`, `user_password`, `user_firstname`, `user_lastname`, `user_type`, `curriculum`, `user_status`, `verify_token`) VALUES ('$user_email', '$user_password', '$user_firstname', '$user_lastname','$user_type', '$curriculum', '$user_status', '$verify_token')";

	if ($user_type =='adviser'){
		if (mysqli_query($conn, $sql)) {

	        $user_id = $conn->insert_id;
	        $insert_faculty = "INSERT INTO `faculty`( `firstName`, `lastName`,`email`,`status`,`user_id`) VALUES ('$user_firstname', '$user_lastname', '$user_email', '$user_status','$user_id')";

	        mysqli_query($conn, $insert_faculty);
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo json_encode(array("statusCode"=>201));
		}
	} else {
		
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo json_encode(array("statusCode"=>201));
		}
	}

	
    
	
	mysqli_close($conn);
?>