<?php //require_once('../admin/includes/admin_header.php'); ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-success ">
	<div class="container">
		
		<a href="#" class="navbar-brand">Admin</a>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#icons" >
			<span class="navbar-toggler-icon"></span>
		</button>
		
		


		<div class="collapse navbar-collapse" id="icons">

			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a href="#" class="nav-link">Dashboard</a>
				</li>

				<li class="nav-item">
					<a href="../admin/category.php" class="nav-link">Categories</a>
				</li>

				<li class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle" id="post" data-toggle="dropdown">Posts</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="../admin/view_posts.php">View All Posts</a>
						<a class="dropdown-item" href="../admin/add_post.php">Add Post</a>
					</div>
				</li>


				<li class="nav-item">
					<a href="../admin/category.php" class="nav-link">Comments</a>
				</li>

				<li class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle" id="users" data-toggle="dropdown">Users</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="#">View All Users</a>
						<a class="dropdown-item" href="#">Add User</a>
					</div>
				</li>

				
			</ul>

			<ul class="navbar-nav ">
				<li class="nav-item">
					<a class="nav-link" href="../public/index.php">Home</a>
				</li>

				
				<li class="nav-item dropdown">
			        <a class="nav-link nav-item dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i>
			          username
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			          	<a class="dropdown-item" href="#"><i class="fa fa-fw fa-user"></i> profile</a>
			          	<div class="dropdown-divider"></div>
	                    
	                    <a href="#" class="dropdown-item"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
	                    
			        </div>
		      	</li>
					
				<!--  -->
			</ul>

			
			
		

		</div>

		

		

		
	</div>
</nav>



<?php require_once('admin_footer.php'); ?>