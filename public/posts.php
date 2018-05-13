<?php require_once('../admin/includes/admin_header.php'); ?>
<?php require_once('../admin/includes/functions.php'); ?>
<?php require_once('../admin/includes/db.php'); ?>

<?php require_once('../admin/includes/navigation.php'); ?>

<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="display">

				<?php 

					if (isset($_GET['id'])) {
						$current_post_id = $_GET['id'];
						$query = "UPDATE posts SET post_views = post_views + 1 WHERE post_id = $current_post_id  ";
						$result = mysqli_query($conn, $query);
						confirm_query($result);
					}

					$query = "SELECT * FROM posts WHERE post_id = $current_post_id";
					$result = mysqli_query($conn, $query);
					confirm_query($result);

					while ($row = mysqli_fetch_assoc($result)) {
						$post_id = $row['post_id'];
						$post_title = $row['post_title'];
						$post_author = $row['post_author'];
						$post_image = $row['post_image'];
						$post_date = $row['post_date'];
						$post_content = $row['post_content']; ?>

						<h3><?php echo $post_title; ?></a></h3>
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

				
			</div> <!-- end of display -->
<br>
		<?php 

			if(isset($_POST['submit'])) {

				$update_count = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = $current_post_id";
				$count_result = mysqli_query($conn, $update_count);
				confirm_query($count_result);

				//$commnet_post_id = $_POST['commnet_post_id '];
				$comment_author = $_POST['author'];
				$comment_content = $_POST['content'];

				if(!empty($comment_author) && !empty($comment_content)) {
					$query = "INSERT INTO comments (comment_post_id, comment_author, comment_content, comment_date) ";
					$query .= "VALUES ($current_post_id, '$comment_author', '$comment_content', now())";

					$result = mysqli_query($conn, $query);
					confirm_query($result);
				} else {
					echo "<script> alert('fill all the data') </script> "; 
				}
				

				
			}

			
		?>
<!-- form for comments -->
			<div class="jumbotron" style="padding: 5px;">
				<h4>Leave a comment</h4>
				<form action="" method="post">
					
					<div class="form-group">
						<label for=author>Author</label>
						<input type="text" name="author" class="form-control">
					</div>

					<div class="form-group">
						<label for="comment">Comment</label>
						<textarea rows="5" cols="20" name="content" class="form-control"></textarea>
					</div>

					<div class="form-group">
						<input type="submit" name="submit" value="Submit" class="btn btn-primary">
					</div>
				</form>
			</div>



		<!-- the end of comment section -->
			
	</div> <!-- end of col-md-8 -->



		<?php require_once('../admin/includes/sidebar.php'); ?>

	</div> <!-- end of row -->
</div> <!-- end of container -->



<?php require_once('../admin/includes/admin_footer.php'); ?>



