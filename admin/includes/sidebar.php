<?php require_once('../admin/includes/admin_header.php'); ?>
<?php require_once('../admin/includes/db.php'); ?>
<?php require_once('../admin/includes/functions.php'); ?>




	

<div class="col-md-4">
	<div class="card bg-light">
		<div class="card-header">
			<h4 class="text-center">Most Read Articles</h4>
		</div>
		<div class="card-body">
			<?php 
				$query = "SELECT * FROM posts WHERE post_status = 'publish' ORDER BY post_views DESC";
				$result = mysqli_query($conn, $query);
				confirm_query($result);

				while($row = mysqli_fetch_assoc($result)) {
					$post_id = $row['post_id'];
					$post_title = $row['post_title']; ?>

			<p class="card-text"><a href="#"><?php echo $post_title; ?></a></p>
			<?php }?>
		</div>
	</div>
	
</div>

