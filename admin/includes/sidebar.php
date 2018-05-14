<?php require_once('../admin/includes/admin_header.php'); ?>
<?php require_once('../admin/includes/db.php'); ?>
<?php require_once('../admin/includes/functions.php'); ?>




	

<div class="col-md-4">

	<div class="card bg-light">
		<div class="card-header">Search</div>
		<form action="../admin/search.php" method="POST">
			<div class="input-group">
				<input type="text" name="search" class="form-control">
				<span class="input-group-btn">
					<button class="btn btn-primary" name="submit" type="submit">
						<span><i class="fa fa-search" aria-hidden="true"></i></span>
					</button>
				</span>
			</div>
			
		</form>
	</div> <br>

	<!-- <div class="card bg-light">
		<div class="card-header">
			<h4 class="text-center">Search</h4>
		</div>
		<div class="card-body">
			<form action="search.php" method="post">
				<div class="col-md-8">
					<div class="form-group">
						<input type="text" name="search" class="form-control">
					</div>
					<span class="col-md-4">
						<span class="form-group">
							<input type="submit" name="submit" value="Search" class="btn btn-primary">
						</span>
					</span>
				</div>
				
			</form>
		</div>
		
	</div> -->

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

