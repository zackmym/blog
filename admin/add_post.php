<?php require_once('../admin/includes/admin_header.php'); ?>
<?php require_once('../admin/includes/db.php'); ?>
<?php require_once('../admin/includes/functions.php'); ?>

<?php 
	if(isset($_POST['add_post'])) {
		$post_title = $_POST['post_title'];
		$post_category = $_POST['post_category'];
		$post_author = $_POST['post_author'];

		
					// $upload_dir = '../admin/uploaded_images/';
				$post_image = $_FILES['post_image']['name'];
				$post_temp_image = $_FILES['post_image']['tmp_name'];


				 move_uploaded_file($post_temp_image, "../admin/uploaded_images/$post_image");

					


		$post_tags = $_POST['post_tags'];
		$post_status = $_POST['post_status'];
		$post_content = $_POST['post_content'];
		$post_date = date('d-m-y');

		$query = "INSERT INTO posts (post_title, post_category, post_author, post_image, post_tags, post_status, post_content, post_date) ";
		$query .= "VALUES('$post_title', '$post_category', '$post_author', '$post_image', '$post_tags', '$post_status', '$post_content', now()) ";
		$insert_result = mysqli_query($conn, $query);
		confirm_query($insert_result); 
		

	}
 ?>





<?php require_once('../admin/includes/admin_navigation.php'); ?>

<div class="row">
	<div class="col-md-8 offset-md-2">
		<form action="" method="post" enctype="multipart/form-data">
			<h3 class="text-center">Add Post</h3>
			<div class="form-group">
				<label for="post_title">Post Title</label>
				<input type="text" name="post_title" class="form-control">
			</div>
			<div class="form-group">
			
				
				<label for="post_category">Post Category</label>
				<select name="post_category">
							<?php 
					$query = "SELECT * FROM category ";
					$result = mysqli_query($conn, $query);
					confirm_query($result); 

					while($row = mysqli_fetch_assoc($result)) {
						$cat_id = $row['cat_id'];
						$cat_title = $row['cat_title'];

					
	
					echo "<option value=\" $cat_title\"> $cat_title </option>";
					 }?>
				</select>

				
			</div>
			<div class="form-group">
				<label for="post_author">Post Author</label>
				<input type="text" name="post_author" class="form-control">
			</div>
			<div class="form-group">
				<label for="post_image">Post Image</label> <br>
				<input type="file" name="post_image" >
			</div>
			<div class="form-group">
				<label for="post_tags">Post Tags</label>
				<input type="text" name="post_tags" class="form-control">
			</div>
			<div class="form-group">
				<label for="post_status">Post Status</label>
				<select name="post_status" class="form-control">
					<option value="" selected disabled hidden >Select option</option>
					<option>Draft</option>
					<option>Publish</option>
				</select>
			</div>
			<div class="form-group">
				<label for="content">Post Content</label>
				<textarea cols="50" rows="10" class="form-control" name="post_content"></textarea>
			</div>
			<div class="form-group">
				<input type="submit" name="add_post" class="btn btn-primary" value="Add Post" >
			</div>
		</form>
	</div>
</div>







<?php require_once('../admin/includes/admin_footer.php'); ?>