<?php require_once('admin_header.php'); ?>
<?php require_once('db.php'); ?>
<?php require_once('functions.php'); ?>


<nav class="navbar navbar-expand-lg navbar-dark bg-success ">
	<div class="container">
		<a href="#" class="navbar-brand">KACK</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#icons" >
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="icons">
			<div class="navbar-nav mr-auto">
				<?php 
					$query = "SELECT * FROM category";
					$category_result = mysqli_query($conn, $query);
					confirm_query($category_result);

					while ($row = mysqli_fetch_assoc($category_result)) {
						$cat_title = $row['cat_title']; 

						echo "<a href='#' class='nav-item nav-link'>$cat_title</a>";
					}
				 ?>


				
			<!--  -->
			</div>
			<div class="navbar-nav ml-auto">
				<a class= "nav-link nav-item" href="../admin/index.php">Admin</a>
			</div>
		</div>
	</div>
</nav>



<?php require_once('admin_footer.php'); ?>