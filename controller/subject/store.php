<?php
	include '../../model/database.php';

	$subject_id		= $_POST['subject_id'];
	$subject_code	= $_POST['subject_code'];
	$subject_name	= $_POST['subject_name'];
	$semester		= $_POST['semester'];
	$curriculum		= $_POST['curriculum'];	
	$year_level		= $_POST['year_level'];
	$unit_lec		= $_POST['unit_lec'];
	$unit_lab		= $_POST['unit_lab'];

	try {
		$sql = "INSERT INTO `tbl_subject`(`subject_id`, `subject_code`, `subject_name`, `sem`, `curriculum`, `year_level`, `unit_lec`, `unit_lab`) 
		VALUES ('$subject_id', '$subject_code', '$subject_name', '$semester', '$curriculum', '$year_level', '$unit_lec', '$unit_lab')";

		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		}  else {
			echo json_encode(array("statusCode"=>201));
		}
	} catch (\Throwable $th) {
		throw $th;
	}
	
	mysqli_close($conn);
?>