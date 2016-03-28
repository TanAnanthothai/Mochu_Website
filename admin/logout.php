<?php
	
	session_start();

	session_destroy();

	header("Location:index.php?sucess=".urlencode("Logged Out Successfully."));

	exit();


?>