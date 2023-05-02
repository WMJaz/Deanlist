<?php
	include '../model/database.php';

	$sql = "SELECT * FROM `users` ORDER BY `curriculum` ASC";

	$result = $conn->query($sql);
    $i = 1;
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
?>	
		<tr>
            <td><?=$i++ ?></td>
			<td> <?=$row['user_email'];?> </td>
			<td class="text-uppercase">
				<?=$row['user_type'];?>
			</td>
			<td class="text-uppercase">
				<?=$row['user_status'];?>
			</td>
            <td>
                <div class="action">
					<a class="action-edit" data-bs-toggle="modal" data-bs-target="#editModal"
						data-firstname		="<?=$row['user_firstname'];?>"
						data-lastname		="<?=$row['user_lastname'];?>"
						data-user_email		="<?=$row['user_email'];?>"
						data-user_type		="<?=$row['user_type'];?>"
						data-user_status	="<?=$row['user_status'];?>"
						data-user_id		="<?=$row['user_id'];?>"						
						data-curriculum		="<?=$row['curriculum'];?>"
					>
						Edit 
					</a>

					<a class="action-delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-user_id = "<?=$row['user_id'];?>">
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