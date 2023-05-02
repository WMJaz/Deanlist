<?php
	include '../model/database.php';

	$user_id        = $_POST['user_id'];
    $user_type      = $_POST['user_type'];
	$user_status    = $_POST['user_status'];
	$curriculum		= $_POST['curriculum'];

	$sql = "UPDATE `users` SET `user_type` = '$user_type', `user_status` = '$user_status', `curriculum` = '$curriculum' WHERE user_id = $user_id";
	
    if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode" => 200));
	} else {
		echo json_encode(array("statusCode" => 201));
	}
	mysqli_close($conn);
?>