<?php require_once('../admin/includes/admin_header.php'); ?>
<?php require_once('../admin/includes/db.php'); ?>
<?php require_once('../admin/includes/functions.php'); ?>


<?php 
	if(isset($_GET['delete'])) {
		$delete_id = $_GET['delete'];

		$delete_query = "DELETE FROM Comments WHERE comment_id = $delete_id ";
		$delete_result = mysqli_query($conn, $delete_query);
		confirm_query($delete_result);

		header("Location: comments.php");
	}
 ?>




<?php require_once('../admin/includes/admin_navigation.php'); ?>

<div class="container">
	<div class="row">
		<div class="col-md-10 offset-md-1">
			<h3 class="text-center">ALL COMMENTS</h3>

			<table class="table table-hover table-bordered">
				<thead class="thead-dark">
					<tr>
						<th> Id</th>
						<th> In Response To </th>
						<th> Author</th>
						<th> Content</th>
						<th> Date</th>
						<th> Edit</th>
					
					</tr>
					
				</thead>

			<?php 
				$query = "SELECT * FROM comments ORDER BY comment_id DESC";
				$result = mysqli_query($conn, $query);
				confirm_query($result);

				while ($row = mysqli_fetch_assoc($result)) {
					$comment_id = $row['comment_id'];
					$comment_post_id = $row['comment_post_id'];
					$comment_author = $row['comment_author'];
					$comment_content = $row['comment_content'];
					$comment_date = $row['comment_date'];
			?>

					<tbody>
						<tr>
							<td><?php echo $comment_id; ?></td>
							<?php 
								$query = "SELECT post_title FROM posts WHERE post_id = $comment_post_id ";
								$result = mysqli_query($conn, $query);
								confirm_query($result);
									$row = mysqli_fetch_assoc($result);
									$post_title = $row['post_title'];

								 ?>
							<td><?php echo $post_title; ?></td>
							<td><?php echo $comment_author; ?></td>
						
							<td><?php echo $comment_content; ?></td>
							<td><?php echo $comment_date; ?></td>
						
							
							<td><a onClick = "return confirm ('are you sure you want to delete?')" href="comments.php?delete=<?php echo $comment_id; ?>">Delete</a></td>

						</tr>
					</tbody>

			<?php	}
			 ?>
			</table>
		
			
		</div>
	</div>
</div>

<?php require_once('../admin/includes/admin_footer.php'); ?>


