<?php
	include '../model/database.php';
	
    $user_id = $_POST['user_id'];

	$sql = "DELETE FROM `users` WHERE user_id = $user_id";
    
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>