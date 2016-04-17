<?php
	$server = 'localhost';
	$user = 'root';
	$password = '';
	$db = 'Mochu';

	$conn = mysqli_connect($server, $user, $password, $db);

	if(!$conn){
		echo "Connection Fialed!";
		die("Connection Fialed!:".mysqli_connect_error());
	} else{
		//echo "Connection to a database ".$db." success" ;
	}
?>