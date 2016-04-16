<?php
	$server = 'localhost';
	$user = 'teerakornm_Mochu';
	$password = 'root';
	$db = 'teerakornm_Mochu';
	
	$conn = mysqli_connect($server, $user, $password, $db);

	if(!$conn){
		echo "Connection Fialed!";
		die("Connection Fialed!:".mysqli_connect_error());
	} else{
		//echo "Connection to a database ".$db." success" ;
	}
?>