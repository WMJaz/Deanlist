<?php
	include '../../model/database.php';
	
	$subject_unique_id	= $_POST['subject_unique_id'];

	$sql = "DELETE FROM `tbl_subject` WHERE subject_unique_id=$subject_unique_id";
    
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	// try {
	

	// } catch (\Throwable $th) {
		
	// 	throw $th;
	// }	

	mysqli_close($conn);
?>