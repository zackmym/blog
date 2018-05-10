<?php require_once('../admin/includes/admin_header.php'); ?>
<?php require_once('../admin/includes/db.php'); ?>
<?php require_once('../admin/includes/functions.php'); ?>







<?php require_once('../admin/includes/admin_navigation.php'); ?>

<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-8 offset-md-2">
			<h3 class="text-center">ALL POSTS</h3>

			<table class="table table-hover">
				<thead class="thead-dark">
					<tr>
						<th> Title</th>
						<th> Category</th>
						<th> Author</th>
						<th> Image</th>
						<th> Tags</th>
						<th> Status</th>
						<th> Content</th>
						<th> Date</th>
						<th> Edit</th>
						<th> Edit</th>
					</tr>
					
				</thead>

			<?php 
				$query = "SELECT * FROM posts";
				$result = mysqli_query($conn, $query);
				confirm_query($result);

				while ($row = mysqli_fetch_assoc($result)) {
					$post_title = $row['post_title'];
					$post_category = $row['post_category'];
					$post_author = $row['post_author'];
					$post_image = $row['post_image'];
					$post_tags = $row['post_tags'];
					$post_status = $row['post_status'];
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
							<td><?php echo $post_content; ?></td>
							<td><?php echo $post_date; ?></td>
							<td><a href="#">Edit</a> </td>
							<td><a href="#">Delete</a></td>

						</tr>
					</tbody>

			<?php	}
			 ?>
			</table>
		
			
		</div>
	</div>
</div>