<?php require_once('../admin/includes/admin_header.php'); ?>
<?php require_once('../admin/includes/functions.php'); ?>
<?php require_once('../admin/includes/db.php'); ?>

<?php 
	if(isset($_POST['submit'])){
		$cat_name = mysqli_real_escape_string($conn, $_POST['cat_name']);

		$query = "INSERT INTO category (cat_title) VALUES('$cat_name')";
		$insert_result = mysqli_query($conn, $query);
		confirm_query($insert_result);
	}
 ?>


<?php require_once('../admin/includes/admin_navigation.php'); ?>
<div class="container">
	<h2>Welcome To Admin Area </h2>
	<hr>
<div class="row">
	<div class="col-md-6">
		
		<form action="" method="post">
			<div class="form-group">
				<label for = 'category'>Create Category</label>
				<input type="text" name="cat_name" class="form-control" placeholder="enter Category name">
			</div>
			<div class="form-group">
				<input type="submit" name="submit" class=" btn btn-primary" value="Add Category">
			</div>
			
		</form>





		<?php 
			if(isset($_GET['edit'])) {
				//$edit_id = $_GET['edit'];
				include "update_category.php";
			}
		 ?>







	</div>

	<div class="col-md-6">
		<h2 class="text-center">Categories</h2>

		<table class="table table-hover">
			<thead>
				<tr>
					<th>Category Id</th>
					<th>Category Title</th>
					<th>Edit</th>
				</tr>
			</thead>

			<?php 
				$display_query = "SELECT * FROM category";
				$display_result = mysqli_query($conn, $display_query);
				confirm_query($display_result);

				while($row = mysqli_fetch_assoc($display_result)) {
		 			$cat_id = $row['cat_id'];
		 			$cat_title = $row['cat_title'];?>
			 

			 <tbody>
			 	<tr>
			 		<td><?php echo $cat_id; ?></td>
			 		<td><?php echo $cat_title; ?></td>
			 		<td><a onClick = "return confirm('Are You Sure You Want To Delete?')" href="category.php?delete=<?php echo urlencode($cat_id); ?>">Delete</a> &nbsp;
			 		<a href="category.php?edit=<?php echo urlencode($cat_id); ?>">Edit</a></td>
			 	</tr>
			 </tbody>
			 <?php } ?>

		</table>
	

	
	</div>
	
</div>

<?php 
	if (isset($_GET['delete'])) {
		$delete_id = $_GET['delete'];

		$query = "DELETE FROM category WHERE cat_id = $delete_id "; 
		$delete_result = mysqli_query($conn, $query);
		confirm_query($delete_result);

		header('Location: category.php');


	}
 ?>


<?php require_once('../admin/includes/admin_footer.php'); ?>


