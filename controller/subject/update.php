<?php
	include '../../model/database.php';

	
	$subject_unique_id	= $_POST['subject_unique_id'];
	$subject_id			= $_POST['subject_id'];
	$subject_code		= $_POST['subject_code'];
	$subject_name		= $_POST['subject_name'];
	$semester			= $_POST['semester'];
	$curriculum			= $_POST['curriculum'];	
	$year_level			= $_POST['year_level'];
	$unit_lec			= $_POST['unit_lec'];
	$unit_lab			= $_POST['unit_lab'];


	try {
		
		$sql = "UPDATE `tbl_subject` SET `subject_id` = '$subject_id', `subject_code` = '$subject_code', `subject_name` = '$subject_name', `sem` = '$semester'
		, `curriculum` = '$curriculum', `year_level` = '$year_level', `unit_lec` = '$unit_lec', `unit_lab` = '$unit_lab', 
		WHERE subject_unique_id = $subject_unique_id";
		
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode" => 200));
		} else {
			echo json_encode(array("statusCode" => 201));
		}

	} catch (\Throwable $th) {
		throw $th;
	}

 
	mysqli_close($conn);
?>