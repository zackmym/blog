<?php require_once('../admin/includes/admin_header.php'); ?>
<?php require_once('../admin/includes/db.php'); ?>
<?php require_once('../admin/includes/functions.php'); ?>


<?php 
	if(isset($_GET['delete'])) {
		$delete_id = $_GET['delete'];

		$delete_query = "DELETE FROM posts WHERE post_id = $delete_id ";
		$delete_result = mysqli_query($conn, $delete_query);
		confirm_query($delete_result);

		header("Location: view_posts.php");
	}
 ?>




<?php require_once('../admin/includes/admin_navigation.php'); ?>

<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h3 class="text-center">ALL POSTS</h3>

			<table class="table table-hover table-bordered">
				<thead class="thead-dark">
					<tr>
						<th> Title</th>
						<th> Category</th>
						<th> Author</th>
						<th> Image</th>
						<th> Tags</th>
						<th> Status</th>
						<th> Comments</th>
						<th> Views</th>
						<th> Date</th>
						<th> Edit</th>
						<th> Edit</th>
					</tr>
					
				</thead>

			<?php 
				$query = "SELECT * FROM posts ORDER BY post_id DESC";
				$result = mysqli_query($conn, $query);
				confirm_query($result);

				while ($row = mysqli_fetch_assoc($result)) {
					$post_id = $row['post_id'];
					$post_title = $row['post_title'];
					$post_category = $row['post_category'];
					$post_author = $row['post_author'];
					$post_image = $row['post_image'];
					$post_tags = $row['post_tags'];
					$post_status = $row['post_status'];
					$post_comments = $row['post_comment_count'];
					$post_views = $row['post_views'];
					$post_content = $row['post_content'];
					$post_date = $row['post_date']; 
			?>

					<tbody>
						<tr>
							<td><?php echo $post_title; ?></td>
							<td><?php echo $post_category; ?></td>
							<td><?php echo $post_author; ?></td>
							<td><img src="../admin/uploaded_images/<?php echo $post_image; ?>" width="100" height = "50"></td>
							<td><?php echo $post_tags; ?></td>
							<td><?php echo $post_status; ?></td>
							<td><?php echo $post_comments; ?></td>
							<td><?php echo $post_views; ?></td>
							<td><?php echo $post_date; ?></td>
							<td><a href="update_post.php?edit=<?php echo $post_id; ?>">Edit</a> </td>
							<td><a onClick = "return confirm ('are you sure you want to delete?')" href="view_posts.php?delete=<?php echo $post_id; ?>">Delete</a></td>

						</tr>
					</tbody>

			<?php	}
			 ?>
			</table>
		
			
		</div>
	</div>
</div>

<?php require_once('../admin/includes/admin_footer.php'); ?>


