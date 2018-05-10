<?php 
require_once('db.php');


	function confirm_query($result) {
		global $conn;
		if(!$result) {
			die('Query failed! '. mysqli_error($conn));
		}
	}
 ?>