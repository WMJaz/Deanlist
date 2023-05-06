<?php
		session_start();
		include '../../model/database.php';

		$sql = 'SELECT * FROM tbl_subject WHERE sem ='.$_POST['sem'].' AND year_level ='.$_POST['yearlevel'].' AND curriculum ="'. $_POST['curriculum'].'" ';

		try {
			
			$result = $conn->query($sql);
		} catch (\Throwable $th) {
	?>
		<td>  Please Choose Semester and Year</td>

	<?php
		}
		$i = 1;
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
	?>		
		<tr>
			<td hidden>
				<input type="text" name="subjid[]"  id="" value="<?=$row['subject_unique_id'];?>">
			</td>
			
			<td>
				<?=$row['subject_code'];?>
				<input type="text" name="subjcode[]" value="<?=$row['subject_code'];?>" hidden>
			</td>

			<td>
				<?=$row['subject_name'];?>
				<input type="text" name="subjname[]" value="<?=$row['subject_name'];?>" hidden>
			</td>
			
			<td>
				<?=$row['unit_lec'];?>
				<input type="text" name="lecunit[]" value="<?=$row['unit_lec'];?>" hidden>
			</td>
			
			<td>
				<?=$row['unit_lab'];?>
				<input type="text" name="labunit[]" value="<?=$row['unit_lab'];?>" hidden>
			</td>
		</tr>

	<?php	
			}
		} else {
	?>
	
		
	<?php
		}
		mysqli_close($conn);
	?>

