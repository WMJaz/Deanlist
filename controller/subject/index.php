<?php
	include '../../model/database.php';

	$sql = "SELECT * FROM `tbl_subject` ORDER BY `sem` ASC";

	$result = $conn->query($sql);
    $i = 1;
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
?>	
		<tr>
            <td><?=$i++ ?></td>

			<td> <?=$row['subject_code'];?> </td>
			<td> <?=$row['subject_name'];?> </td>
			<td> <?=$row['sem'];?> </td>
			<td> <?=$row['curriculum'];?> </td>
			<td> <?=$row['year_level'];?> </td>
		
            <td>
                <div class="action">
					<a class="action-edit" data-bs-toggle="modal" data-bs-target="#editModal"
						data-subject_unique_id	="<?=$row['subject_unique_id'];?>"
						data-subject_id			="<?=$row['subject_id'];?>"	
						data-subject_code		="<?=$row['subject_code'];?>"
						data-subject_name		="<?=$row['subject_name'];?>"
						data-semester			="<?=$row['sem'];?>"
						data-curriculum			="<?=$row['curriculum'];?>"
						data-year_level			="<?=$row['year_level'];?>"
						data-unit_lec			="<?=$row['unit_lec'];?>"
						data-unit_lab			="<?=$row['unit_lab'];?>"
					>
						Edit
					</a>

					<a class="action-delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-subject_unique_id = "<?=$row['subject_unique_id'];?>">
						Delete
					</a>
                </div>
            </td>
		</tr>
<?php	
	    }
	} else {
		
	}
	mysqli_close($conn);
?>