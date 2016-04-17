<?php
	
include('includes/config.php');
include('includes/db.php');

if(isset($_GET['token'])){
	$token = $_GET['token'];
	$query="UPDATE Users SET status='1' WHERE token='$token'";
	if($conn->query($query)){
		header("Location:index.php?success=Account Activated!!");
		exit();
	}
	//http://localhost/registration/activate.php?token=
}



?>