<?php 
	require_once('../admin/includes/admin_header.php');
	require_once('../admin/includes/db.php');
	require_once('../admin/includes/functions.php');

	if (isset($_GET['edit'])) {
		
		$edit_id = $_GET['edit'];
	}

	if (isset($_POST['update'])) {
		$cat_title = $_POST['cat_title'];
		
		$update_query = "UPDATE category SET cat_title = '$cat_title' WHERE cat_id = $edit_id";
		$update_result = mysqli_query($conn, $update_query);
		confirm_query($update_result);




}
	
 ?>

 <form action="" method="post">
 	<div class="form-group">
 		<label for="cat-title"> Edit Category </label>
 		<input type="text" name="cat_title" class="form-control" placeholder="enter category name">
 	</div>
 	<div class="form-group">
 		<input type="submit" name="update" value="Update Category" class="btn btn-primary">
 	</div>
 	
 </form>
