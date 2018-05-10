<?php require_once('../admin/includes/admin_header.php'); ?>
<?php require_once('../admin/includes/functions.php'); ?>
<?php require_once('../admin/includes/db.php'); ?>

<?php require_once('../admin/includes/navigation.php'); ?>

<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="display">
				<?php 
					$query = "SELECT * FROM posts ORDER BY post_id DESC";
					$result = mysqli_query($conn, $query);
					confirm_query($result);

					while ($row = mysqli_fetch_assoc($result)) {
						$post_id = $row['post_id'];
						$post_title = $row['post_title'];
						$post_author = $row['post_author'];
						$post_image = $row['post_image'];
						$post_date = $row['post_date'];
						$post_content = $row['post_content']; ?>

						<h3><a href="posts.php?id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a></h3>
						<p><?php echo $post_author;?></p>
						<p>Posted on <?php echo $post_date; ?></p>
						<div class="image">
							<img class="img-fluid" src="../admin/uploaded_images/<?php echo $post_image; ?>" >
						</div>
						<br>

						<p><?php echo $post_content; ?></p> <br>
						<hr>
					<?php }
				 ?>

				
			</div>
		</div>



		<?php require_once('../admin/includes/sidebar.php'); ?>
	</div>
</div>

<?php 
	if(isset($_GET['id'])) {
		$current_post_id = $_GET['id'];
	}
 ?>


<?php require_once('../admin/includes/admin_footer.php'); ?>



