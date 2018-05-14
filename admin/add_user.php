<?php require_once('../admin/includes/admin_header.php'); ?>
<?php require_once('../admin/includes/db.php'); ?>
<?php require_once('../admin/includes/functions.php'); ?>

<?php 
	if(isset($_POST['add_user'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$re_password = $_POST['re_password'];
		$user_email = $_POST['user_email'];
		$user_role = $_POST['user_role'];
		
		if(!empty($username) && !empty($password) && !empty($re_password) && !empty($user_email) && !empty($user_role) && $password == $re_password) {

			$query = "INSERT INTO users (username, password, re_password, user_email, user_role) ";
			$query .= "VALUES('$username', '$password', '$re_password', '$user_email', '$user_role') ";
			$insert_result = mysqli_query($conn, $query);
			confirm_query($insert_result);

			echo "<script> alert('User Added Successfully') </script> ";

		} elseif ($password !== $re_password) {
		 	
		 	echo "Passwords do not match!!" ;
	} else {
		echo "fill all the fields";
	}
}

 ?>
		





<?php require_once('../admin/includes/admin_navigation.php'); ?>

<div class="row">
	<div class="col-md-8 offset-md-2">
		<form action="" method="post" enctype="multipart/form-data">

			<h3 class="text-center">Add Users</h3>

			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" name="username" class="form-control">
			</div>
	
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" class="form-control">
			</div>


			<div class="form-group">
				<label for="re_password">Confirm Password</label>
				<input type="password" name="re_password" class="form-control">
			</div>


			<div class="form-group">
				<label for="content">Email adress</label>
				<input type="email" name="user_email" class="form-control">
			</div>

			<div class="form-group">
				<label for="user_role">Role</label>
				<select name="user_role" >
					<option value="subscriber"  >Select option</option>
					<option value="subscriber">Subscriber</option>
					<option value="admin">Admin</option>
				</select>
			</div>

			<div class="form-group">
				<input type="submit" name="add_user" class="btn btn-primary" value="Add User" >
			</div>
		</form>
	</div>
</div>







<?php require_once('../admin/includes/admin_footer.php'); ?>