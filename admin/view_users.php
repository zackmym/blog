<?php require_once('../admin/includes/admin_header.php'); ?>
<?php require_once('../admin/includes/db.php'); ?>
<?php require_once('../admin/includes/functions.php'); ?>


<?php 
	if(isset($_GET['delete'])) {
		$delete_id = $_GET['delete'];

		$delete_query = "DELETE FROM users WHERE user_id = $delete_id ";
		$delete_result = mysqli_query($conn, $delete_query);
		confirm_query($delete_result);

		header("Location: view_users.php");
	}
 ?>




<?php require_once('../admin/includes/admin_navigation.php'); ?>

<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<h3 class="text-center">ALL USERS</h3>

			<table class="table table-hover table-bordered">
				<thead class="thead-dark">
					<tr>
						<th> user_id</th>
						<th> Username</th>
						<th> Email</th>
						<th> Role</th>
						<th> Edit</th>
						<th> Edit</th>
					</tr>
					
				</thead>

			<?php 
				$query = "SELECT * FROM users ORDER BY user_id DESC";
				$result = mysqli_query($conn, $query);
				confirm_query($result);

				while ($row = mysqli_fetch_assoc($result)) {
					$user_id = $row['user_id'];
					$username = $row['username'];
					$user_email = $row['user_email'];
					$user_role = $row['user_role'];
					
			?>

					<tbody>
						<tr>
							<td><?php echo $user_id; ?></td>
							<td><?php echo $username; ?></td>
							<td><?php echo $user_email; ?></td>
							<td><?php echo $user_role; ?></td>
							<td><a href="update_user.php?edit=<?php echo $user_id; ?>">Edit</a> </td>
							<td><a onClick = "return confirm ('are you sure you want to delete?')" href="view_users.php?delete=<?php echo $user_id; ?>">Delete</a></td>

						</tr>
					</tbody>

			<?php	}
			 ?>
			</table>
		
			
		</div>
	</div>
</div>

<?php require_once('../admin/includes/admin_footer.php'); ?>


